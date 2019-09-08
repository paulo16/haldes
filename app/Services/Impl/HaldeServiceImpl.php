<?php

namespace App\Services\Impl;

use App\Halde;
use App\Personne;
use App\Services\HaldeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Barryvdh\Debugbar\Facade as Debugbar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use stdClass;

class HaldeServiceImpl implements HaldeService
{

    public function listhaldesfrontend(Request $request)
    {
        $columns = array(
            0 => 'haldes.id',
            1 => 'nom_halde',
            2 => 'carte',
            3 => 'coordonnees',
            4 => 'nom_region',
            5 => 'province_noms',
            6 => 'qte_dechets',
            7 => 'substance_noms',
            8 => 'info_complementairess',
            9 => 'action',


        );

        $totalData = Halde::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $haldes = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftjoin('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')

                ->select(
                    'haldes.id as id_halde',
                    'haldes.nom as nom_halde',
                    'haldes.coordonnees as coordonnees',
                    'regions.nom as nom_region',
                    'province_noms',
                    'substance_noms',
                    'groupehaldes.date_fin_publication',
                    'carte',
                    'groupehaldes.disponible',
                    'haldes.qte_dechets as qte_dechets',
                    'haldes.created_at as created_at',
                    'groupehaldes.date_publication',
                    'info_complementaires'
                )
                ->where('groupehaldes.disponible', '=', 1)
                ->where('groupehaldes.date_publication', '<=', Carbon::now())
                ->where('groupehaldes.date_fin_publication', '>=', Carbon::now())
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $haldes = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftjoin('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')

                ->select(
                    'haldes.id as id_halde',
                    'haldes.nom as nom_halde',
                    'haldes.coordonnees as coordonnees',
                    'regions.nom as nom_region',
                    'province_noms',
                    'substance_noms',
                    'groupehaldes.date_fin_publication',
                    'carte',
                    'groupehaldes.disponible',
                    'haldes.qte_dechets as qte_dechets',
                    'haldes.created_at as created_at',
                    'groupehaldes.date_publication',
                    'info_complementaires'
                )
                ->where('groupehaldes.disponible', '=', 1)
                ->where('groupehaldes.date_publication', '<=', Carbon::now())
                ->where('groupehaldes.date_fin_publication', '>=', Carbon::now())
                ->where('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.coordonnees', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('haldes.carte', 'LIKE', "%{$search}%")
                ->orWhere('haldes.province_noms', 'LIKE', "%{$search}%")
                ->orWhere('haldes.substance_noms', 'LIKE', "%{$search}%")

                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftjoin('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')

                ->select(
                    'haldes.id as id_halde',
                    'haldes.nom as nom_halde',
                    'haldes.coordonnees as coordonnees',
                    'regions.nom as nom_region',
                    'province_noms',
                    'substance_noms',
                    'groupehaldes.date_fin_publication',
                    'carte',
                    'groupehaldes.disponible',
                    'haldes.qte_dechets as qte_dechets',
                    'haldes.created_at as created_at',
                    'groupehaldes.date_publication',
                    'info_complementaires'
                )
                ->where('groupehaldes.disponible', '=', 1)
                ->where('groupehaldes.date_publication', '<=', Carbon::now())
                ->where('groupehaldes.date_fin_publication', '>=', Carbon::now())
                ->where('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.coordonnees', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('haldes.carte', 'LIKE', "%{$search}%")
                ->orWhere('haldes.province_noms', 'LIKE', "%{$search}%")
                ->orWhere('haldes.substance_noms', 'LIKE', "%{$search}%")

                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->count();
        }

        $data = array();
        $haldesidpris = array();
        $input = "";
        $monhalde = null;

        if (!empty($haldes)) {
            $currentuser    = Auth::user();

            $personne = Personne::leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->select(
                    'personnes.id as id',
                    'personnes.nom as nom_p',
                    'personnes.prenom as prenom_p',
                    'personnes.adresse as adresse_p'
                )
                ->where('personnes.user_id', $currentuser->id)
                ->get()
                ->first();

            $timepass_mois = $this->timepass($personne->id);

            Debugbar::info($timepass_mois);


            $haldesdesautres = Halde::join('demandes', 'haldes.id', '=', 'demandes.halde_id')
                ->join('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')
                ->select('haldes.id as id')
                ->where('demandes.personne_id', '<>', $personne->id)
                ->where('groupehaldes.date_publication', '<=', Carbon::now())
                ->where('groupehaldes.date_fin_publication', '>=', Carbon::now())
                ->get();

            $monhalde = Halde::join('demandes', 'haldes.id', '=', 'demandes.halde_id')
                ->select('haldes.id as id')
                ->where('demandes.personne_id', '=', $personne->id)
                ->latest('id')->first();



            foreach ($haldesdesautres as $halde) {
                $haldesidpris[] = $halde->id;
            }
        }
        foreach ($haldes as $halde) {
            $input = '<input type="radio" class="reserver" value=":id"  name="halde"  >';

            $input = str_replace(":id", $halde->id_halde, $input);

            if (isset($timepass_mois) && $timepass_mois <= 20) {

                if (!in_array($halde->id_halde, $haldesidpris) && $halde->id_halde != $monhalde->id) {

                    $input = '<input class="reserver" type="radio"  value=":id"  name="halde"  disabled>';
                } else {
                    $input = '<span style="font-color:red">Halde reservé par vous</span> ';
                }
            }

            // Debugbar::info($haldesidpris);

            if (in_array($halde->id_halde, $haldesidpris)) {
                $input = "Halde déja reservé par d'autres ";
                Debugbar::info($input);
            }


            $show  = route('haldes.show', $halde->id_halde);


            $nestedData['id_halde']     = $halde->id_halde;
            $nestedData['nom_halde']    = "<a href='{$show}' title='SHOW' >" . $halde->nom_halde . "</a>";
            $nestedData['coordonnees']  = $halde->coordonnees;
            $nestedData['nom_region']   = $halde->nom_region;
            $nestedData['province_noms'] = $halde->province_noms;
            $nestedData['carte'] = $halde->carte;
            $nestedData['info_complementaires'] = $halde->info_complementaires;
            $nestedData['substance_noms'] = $halde->subtance_noms;
            $nestedData['qte_dechets']  = $halde->qte_dechets;
            $nestedData['action'] = $input;
            //$date                       = new Date($halde->created_at);
            //$nestedData['created_at']   = $date->format('l j F Y H:i:s');



            $data[] = $nestedData;
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
        );

        return $json_data;
    }

    public function update(Request $request, $id)
    { }

    public function store(Request $request)
    { }

    public function find($id)
    {
        $halde = Halde::find($id);

        return $halde;
    }

    public function delete($id)
    { }

    /**
     * @return int
     */

    public function count()
    {
        return Halde::count();
    }

    public function listpays()
    { }

    public function timepass($iddemandeur)
    {
        $datenow     = new \DateTime();
        $datenow     = $datenow->format('Y-m-d H:i:s');
        $lastdemande = \DB::table('demandes')->where('personne_id', $iddemandeur)->latest('id')->first();

        $months = null;
        $minutes = null;
        if (isset($lastdemande)) {
            $diff = strtotime($datenow) - strtotime($lastdemande->created_at);

            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                / (30 * 60 * 60 * 24));

            // $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
            //     $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            // $hours = floor(($diff - $years * 365 * 60 * 60 * 24
            //     - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
            //     / (60 * 60));
            // $minutes = floor(($diff - $years * 365 * 60 * 60 * 24
            //     - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
            //     - $hours * 60 * 60) / 60);
            // $seconds = floor(($diff - $years * 365 * 60 * 60 * 24
            //     - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
            //     - $hours * 60 * 60 - $minutes * 60));
        }

        return $months;
    }

    public function listehaldesback(Request $request)
    {
        $columns = array(
            0 => 'haldes.nom',
            1 => 'coordonnees',
            2 => 'carte',
            3 => 'region',
            4 => 'province_noms',
            5 => 'qte_dechets',
            6 => 'substance_noms',
            7 => 'info_complementaires',
            8 => 'date_publication',
            9 => 'action',
            10 => 'reserver',
        );

        $totalData = Halde::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $haldes = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftjoin('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')
                ->select(
                    'haldes.id as id_halde',
                    'haldes.nom as nom_halde',
                    'haldes.coordonnees as coordonnees',
                    'regions.nom as nom_region',
                    'province_noms',
                    'substance_noms',
                    'groupehaldes.date_fin_publication',
                    'carte',
                    'haldes.qte_dechets as qte_dechets',
                    'haldes.created_at as created_at',
                    'groupehaldes.date_publication',
                    'info_complementaires',
                    'haldes.disponible'
                )
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            if ($search == "oui") {
                $search = 1;
            } elseif ($search == "non") {
                $search = 0;
            }

            $haldes = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftjoin('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')
                ->select(
                    'haldes.id as id_halde',
                    'haldes.nom as nom_halde',
                    'haldes.coordonnees as coordonnees',
                    'regions.nom as nom_region',
                    'province_noms',
                    'substance_noms',
                    'groupehaldes.date_fin_publication',
                    'carte',
                    'haldes.qte_dechets as qte_dechets',
                    'haldes.created_at as created_at',
                    'groupehaldes.date_publication',
                    'info_complementaires',
                    'haldes.disponible'
                )->where('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.coordonnees', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('haldes.carte', 'LIKE', "%{$search}%")
                ->orWhere('haldes.province_noms', 'LIKE', "%{$search}%")
                ->orWhere('haldes.substance_noms', 'LIKE', "%{$search}%")
                ->orwhere('groupehaldes.date_publication', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();


            $totalFiltered = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftjoin('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')
                ->select(
                    'haldes.id as id_halde',
                    'haldes.nom as nom_halde',
                    'haldes.coordonnees as coordonnees',
                    'regions.nom as nom_region',
                    'province_noms',
                    'substance_noms',
                    'groupehaldes.date_fin_publication',
                    'carte',
                    'haldes.qte_dechets as qte_dechets',
                    'haldes.created_at as created_at',
                    'groupehaldes.date_publication',
                    'info_complementaires',
                    'haldes.disponible'
                )
                ->where('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.coordonnees', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('haldes.carte', 'LIKE', "%{$search}%")
                ->orWhere('haldes.province_noms', 'LIKE', "%{$search}%")
                ->orWhere('haldes.substance_noms', 'LIKE', "%{$search}%")
                ->orwhere('groupehaldes.date_publication', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->count();
        }


        $data = array();
        if (!empty($haldes)) {

            foreach ($haldes as $halde) {

                $url_edit = '<a href=":url" class="green" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                $edit = route('haldes.edit', $halde->id_halde);
                $del = str_replace(":id", $halde->id_halde, $delete);
                $url_edit = str_replace(":url", $edit, $url_edit);
                $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $url_edit . '&nbsp;' . $del . '<div>';
                $reserver = $halde->disponible == 1 ? "non" : 'oui';


                $nestedData['id_halde']     = $halde->id_halde;
                $nestedData['nom_halde']    = "<a href='#' title='SHOW' >" . $halde->nom_halde . "</a>";
                $nestedData['coordonnees']  = $halde->coordonnees;
                $nestedData['nom_region']   = $halde->nom_region;
                $nestedData['province_noms'] = $halde->province_noms;
                $nestedData['carte'] = $halde->carte;
                $nestedData['reserver'] = $reserver;
                $nestedData['date_publication'] = $halde->date_publication;
                $nestedData['info_complementaires'] = $halde->info_complementaires;
                $nestedData['substance_noms'] = $halde->substance_noms;
                $nestedData['qte_dechets']  = $halde->qte_dechets;
                $nestedData['action'] = $action;
                //$date                       = new Date($halde->created_at);
                //$nestedData['created_at']   = $date->format('l j F Y H:i:s');

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
        );

        return $json_data;
    }
}
