<?php

namespace App\Services\Impl;

use App\Halde;
use App\Services\HaldeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HaldeServiceImpl implements HaldeService
{

    public function listhaldesfrontend(Request $request)
    {
        $columns = array(
            0 => 'haldes.id',
            1 => 'nom_halde',
            2 => 'coordonnees',
            3 => 'nom_province',
            4 => 'nom_region',
            5 => 'qte_dechets',
            6 => 'info_complementaires',
            7 => 'action',
        );

        $totalData = Halde::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $haldes = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->join('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
                ->select('haldes.id as id_halde', 'haldes.nom as nom_halde', 'haldes.coordonnees as coordonnees', 'regions.nom as nom_region', 'province_prefecture.nom as nom_province', 'haldes.qte_dechets as qte_dechets', 'haldes.created_at as created_at')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $haldes = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->join('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
                ->select('haldes.id as id_halde', 'haldes.nom as nom_halde', 'haldes.coordonnees as coordonnees', 'regions.nom as nom_region', 'province_prefecture.nom as nom_province', 'haldes.qte_dechets as qte_dechets', 'haldes.created_at as created_at')
                ->where('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.coordonnees', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('province_prefecture.nom', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Halde::leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
                ->join('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
                ->select('haldes.id as id_halde', 'haldes.nom as nom_halde', 'haldes.coordonnees as coordonnees', 'regions.nom as nom_region', 'province_prefecture.nom as nom_province', 'haldes.qte_dechets as qte_dechets', 'haldes.created_at as created_at')
                ->where('haldes.nom', 'LIKE', "%{$search}%")
                ->orwhere('haldes.coordonnees', 'LIKE', "%{$search}%")
                ->orWhere('regions.nom', 'LIKE', "%{$search}%")
                ->orWhere('province_prefecture.nom', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->count();
        }

        $data = array();
        if (!empty($haldes)) {

            $TEMPS_TRAITEMENT = env("TEMPS_TRAITEMENT");
            $TEMPS_ACCEPTE    = env("TEMPS_ACCEPTE");
            $TEMPS_REJETE     = env("TEMPS_REJETE");
            $timepass         = $this->timepass();

            $input = '<input type="radio" value=":id"  name="halde"  >';

            if ($timepass < $TEMPS_TRAITEMENT) {
                $input = '<input type="radio" value=":id"  name="halde"  disabled>';
            }
            if ($timepass < $TEMPS_ACCEPTE) {
                $input = '<input type="radio" value=":id"  name="halde"  disabled>';
            }
            if ($timepass < $TEMPS_REJETE) {
                $input = '<input type="radio" value=":id"  name="halde"  disabled>';
            }

        }
        foreach ($haldes as $halde) {
            $show  = route('haldes.show', $halde->id_halde);
            $input = str_replace(":id", $halde->id_halde, $input);

            $nestedData['id_halde']     = $halde->id_halde;
            $nestedData['nom_halde']    = "<a href='{$show}' title='SHOW' >" . $halde->nom_halde . "</a>";
            $nestedData['coordonnees']  = $halde->coordonnees;
            $nestedData['nom_region']   = $halde->nom_region;
            $nestedData['nom_province'] = $halde->nom_province;
            $nestedData['qte_dechets']  = $halde->qte_dechets;
            //$date                       = new Date($halde->created_at);
            //$nestedData['created_at']   = $date->format('l j F Y H:i:s');

            $nestedData['action'] = $input;

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
    {

    }

    public function store(Request $request)
    {

    }

    public function find($id)
    {
        $halde = Halde::find($id);

        return $halde;
    }

    public function delete($id)
    {

    }

/**
 * @return int
 */

    public function count()
    {
        return Halde::count();
    }

    public function listpays()
    {
    }

    public function timepass()
    {
        $datenow     = new \DateTime();
        $datenow     = $datenow->format('Y-m-d H:i:s');
        $lastdemande = \DB::table('demandes')->latest('id')->first();

        $seconds = strtotime($datenow) - strtotime($lastdemande->created_at);

        $days    = floor($seconds / 86400);
        $hours   = floor(($seconds - ($days * 86400)) / 3600);
        $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600)) / 60);
        $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes * 60)));

        return $minutes;
    }
}
