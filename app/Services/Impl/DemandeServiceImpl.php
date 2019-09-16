<?php

namespace App\Services\Impl;

use App\Demande;
use App\Personne;
use App\Services\DemandeService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DemandeServiceImpl implements DemandeService
{

    public function listdemandes(Request $request)
    {
        $columns = array(
            0 => 'demandes.id',
            1 => 'identifiant',
            2 => 'nom_resp',
            3 => 'nom_site',
            4 => 'region',
            5 => 'province',
            6 => 'coordonnees',
            7 => 'date_demande',
            8 => 'etat',
            9 => 'action',
        );

        $currentuser = Auth::user();
        $personne    = Personne::leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->select('personnes.id', 'nom', 'email', 'user_id')
            ->where('personnes.user_id', $currentuser->id)
            ->get()
            ->first();

        $totalData = Demande::where('personne_id', $personne->id)->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $demandes = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
                ->leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
                ->leftJoin('haldes', 'haldes.id', '=', 'demandes.halde_id')
                ->leftJoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftJoin('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
                ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
                ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
                ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
                ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
                ->select(
                    'personnes.nom as nom_p',
                    'personnes.prenom as prenom_p',
                    'pp.nom_fr as nationalite_p',
                    'personnes.adresse as adresse_p',
                    'personnes.telephone_fixe as fixe_p',
                    'personnes.mobile as mobile_p',
                    'structures.nom as nom_s',
                    'structures.siege as siege',
                    'structures.capital as capital',
                    'typestructures.nom as type_s',
                    'ps.nom_fr as nationalite_s',
                    'entreprises.raison_social as raison_social',
                    'entreprises.registre_commerce as registre_commerce',
                    'entreprises.nombre_actionnaires as nombre_actionnaires',
                    'entreprises.ice as ice',
                    'entreprises.cnss as cnss',
                    'haldes.disponible as disponible',
                    'entreprises.if as if',
                    'haldes.id as id_halde',
                    'haldes.disponible as disponible',
                    'users.email as email',
                    'haldes.nom as nom_halde',
                    'haldes.x_y as coordonnees',
                    'haldes.qte_dechets as qte_dechets',
                    'regions.nom as region',
                    'province_prefecture.nom as province',
                    'demandes.created_at as date_creation',
                    'demandes.nom as identifiant',
                    'demandes.id as id_demande',
                    'demandes.etat as etat',
                    'demandes.annuler as annuler'
                )
                ->where('personnes.id', $personne->id)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search   = $request->input('search.value');
            $demandes = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
                ->leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
                ->leftJoin('haldes', 'haldes.id', '=', 'demandes.halde_id')
                ->leftJoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftJoin('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
                ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
                ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
                ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
                ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
                ->select(
                    'personnes.nom as nom_p',
                    'personnes.prenom as prenom_p',
                    'pp.nom_fr as nationalite_p',
                    'personnes.adresse as adresse_p',
                    'personnes.telephone_fixe as fixe_p',
                    'personnes.mobile as mobile_p',
                    'structures.nom as nom_s',
                    'structures.siege as siege',
                    'structures.capital as capital',
                    'typestructures.nom as type_s',
                    'haldes.disponible as disponible',
                    'ps.nom_fr as nationalite_s',
                    'entreprises.raison_social as raison_social',
                    'entreprises.registre_commerce as registre_commerce',
                    'entreprises.nombre_actionnaires as nombre_actionnaires',
                    'entreprises.ice as ice',
                    'entreprises.cnss as cnss',
                    'entreprises.if as if',
                    'users.email as email',
                    'haldes.id as id_halde',
                    'haldes.disponible as disponible',
                    'haldes.nom as nom_halde',
                    'haldes.x_y as coordonnees',
                    'haldes.qte_dechets as qte_dechets',
                    'regions.nom as region',
                    'province_prefecture.nom as province',
                    'demandes.created_at as date_creation',
                    'demandes.nom as identifiant',
                    'demandes.id as id_demande',
                    'demandes.etat as etat',
                    'demandes.annuler as annuler'
                )
                ->where('personnes.id', $personne->id)
                ->orwhere('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.x_y', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('province_prefecture.nom', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
                ->leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
                ->leftJoin('haldes', 'haldes.id', '=', 'demandes.halde_id')
                ->leftJoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->leftJoin('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
                ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
                ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
                ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
                ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
                ->select(
                    'personnes.nom as nom_p',
                    'personnes.prenom as prenom_p',
                    'pp.nom_fr as nationalite_p',
                    'personnes.adresse as adresse_p',
                    'personnes.telephone_fixe as fixe_p',
                    'personnes.mobile as mobile_p',
                    'structures.nom as nom_s',
                    'structures.siege as siege',
                    'structures.capital as capital',
                    'typestructures.nom as type_s',
                    'ps.nom_fr as nationalite_s',
                    'entreprises.raison_social as raison_social',
                    'entreprises.registre_commerce as registre_commerce',
                    'entreprises.nombre_actionnaires as nombre_actionnaires',
                    'entreprises.ice as ice',
                    'entreprises.cnss as cnss',
                    'entreprises.if as if',
                    'users.email as email',
                    'haldes.nom as nom_halde',
                    'haldes.id as id_halde',
                    'haldes.disponible as disponible',
                    'haldes.x_y as coordonnees',
                    'haldes.qte_dechets as qte_dechets',
                    'regions.nom as region',
                    'province_prefecture.nom as province',
                    'demandes.created_at as date_creation',
                    'demandes.nom as identifiant',
                    'demandes.id as id_demande',
                    'demandes.etat as etat',
                    'demandes.annuler as annuler'
                )
                ->where('personnes.id', $personne->id)
                ->orwhere('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.x_y', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('province_prefecture.nom', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->count();
        }

        $data = array();
        if (!empty($demandes)) {

            foreach ($demandes as $demande) {
                $show       = route('demande.show', $demande->id_demande);
                $voir       = "voir";
                $demande_id = $demande->id_demande;
                $del="";

                if($demande->annuler !== "oui"){
                    $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i>annuler</a>';
                    $del = str_replace(":id", $demande->id_demande, $delete);
                }else{
                    $delete = 'demande annulée';
                    $del=  $delete;

                }
             

                $nestedData['id_demande'] = $demande->id_demande;

                $nestedData['identifiant'] = "<a data-id='{$demande_id}' href='{$show}' class='{$voir}' title='SHOW' >" . $demande->identifiant . "</a>";

                $nestedData['nom_resp']     = $demande->nom_p;
                $nestedData['nom_site']     = $demande->nom_halde;
                $nestedData['region']       = $demande->region;
                $nestedData['province']     = $demande->province;
                $nestedData['coordonnees']  = $demande->coordonnees;
                $nestedData['date_demande'] = $demande->date_creation;
                $nestedData['etat']         = $demande->etat;
                $nestedData['action']         = $del;
                //$date                       = new Date($Demande->created_at);
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

    public function count()
    {
        return Demande::count();
    }

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
}
