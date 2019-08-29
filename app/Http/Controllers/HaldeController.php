<?php

namespace App\Http\Controllers;

use App\Halde;
use App\Region;
use App\Substanceexploitee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Debugbar;
use Illuminate\Support\Facades\Storage;

class HaldeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.haldes.list");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::select()->orderBy('nom', 'asc')->get()->toArray();
        $provinces = \DB::table('province_prefecture')->select()->orderBy('nom', 'asc')->get()->toArray();
        $substances = Substanceexploitee::select()->orderBy('nom', 'asc')->get()->toArray();


        return view('backend.haldes.add', compact('regions', 'provinces', 'substances'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'coordonnees' => 'required',
            'region' => 'required',
            'province' => 'required',
        ]);
        $halde = new Halde();
        $substance = $request->get('substance') ? $request->get('substance') : '';
        $halde->nom = $request->get('nom') ? $request->get('nom') : '';
        $halde->coordonnees = $request->get('coordonnees') ? $request->get('coordonnees') : '';
        $halde->region_id = $request->get('region') ? $request->get('region') : '';
        $halde->province_id = $request->get('province') ? $request->get('province') : '';
        $halde->qte_dechets = $request->get('dechets') ? $request->get('dechets') : '';
        $halde->info_complementaires = $request->get('info_comp') ? $request->get('info_comp') : '';

        if ($halde->save()) {
            \DB::table('halde_substanceexploitee')->insert([
                ['halde_id' => $halde->id, 'substance_id' => $substance],
            ]);
        }

        return $halde->id ? redirect()->route('haldes.index') : redirect()->route('haldes.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $halde = Halde::find($id);
        return  view('backend.haldes.show', compact('halde'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $halde = Halde::find($id);
        $regions = Region::select()->orderBy('nom', 'asc')->get()->toArray();
        $provinces = \DB::table('province_prefecture')->select()->orderBy('nom', 'asc')->get()->toArray();
        $substances = Substanceexploitee::select()->orderBy('nom', 'asc')->get()->toArray();

        return view('backend.haldes.edit', compact('halde', 'regions', 'provinces', 'substances'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'coordonnees' => 'required',
            'region' => 'required',
            'province' => 'required',
        ]);
        $halde = Halde::find($id);
        $substance = $request->get('substance') ? $request->get('substance') : '';
        $halde->nom = $request->get('nom') ? $request->get('nom') : '';
        $halde->coordonnees = $request->get('coordonnees') ? $request->get('coordonnees') : '';
        $halde->region_id = $request->get('region') ? $request->get('region') : '';
        $halde->province_id = $request->get('province') ? $request->get('province') : '';
        $halde->qte_dechets = $request->get('dechets') ? $request->get('dechets') : '';
        $halde->info_complementaires= $request->get('info_comp') ? $request->get('info_comp') : '';

        if ($halde->save()) {
            \DB::table('halde_substanceexploitee')->insert([
                ['halde_id' => $halde->id, 'substance_id' => $substance],
            ]);
        }
        return redirect()->route('haldes.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $halde = Halde::find($id);
        return $halde->delete();
    }
    public function data(Request $request)
    {
        $haldes = \DB::table('haldes')->leftjoin('regions', 'regions.id', '=', 'haldes.region_id')
            ->leftjoin('province_prefecture as pp', 'pp.id', '=', 'haldes.province_id')
            ->leftjoin('halde_substanceexploitee as hs', 'hs.halde_id', '=', 'haldes.id')
            ->leftjoin('substanceexploitees as sub', 'sub.id', '=', 'hs.substance_id')
            ->select([
                'haldes.id as id', 'haldes.nom as nom', 'haldes.coordonnees',
                'haldes.qte_dechets as qtedechets', 'haldes.info_complementaires as info_comp', 'pp.nom as province',
                'regions.nom as region', 'sub.nom as substance', 'haldes.created_at'
            ]);
        $datatables = Datatables::of($haldes)
            ->addColumn('action', function ($model) {
                $url_edit = '<a href=":url" class="green" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                $edit = route('haldes.edit', $model->id);
                $del = str_replace(":id", $model->id, $delete);
                $url_edit = str_replace(":url", $edit, $url_edit);
                $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $url_edit . '&nbsp;' . $del . '<div>';
                return $action;
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
            });
        // les filtres 
        // Global search function
        if ($keyword = $request->get('search')['value']) {
            //Debugbar::info($keyword);
            // override haldes.name global search
            $datatables->filterColumn('region', function ($query, $keyword) {
                $query->where('regions.nom', 'like', "%" . $keyword . "%");
            });
            
            $datatables->filterColumn('qtedechets', function ($query, $keyword) {
                $query->where('haldes.qte_dechets', 'like', "%" . $keyword . "%");
            });

            $datatables->filterColumn('province', function ($query, $keyword) {
                $query->where('pp.nom', 'like', "%" . $keyword . "%");
            });
            $datatables->filterColumn('substance', function ($query, $keyword) {
                $query->where('sub.nom', 'like', "%" . $keyword . "%");
            });
            $datatables->filterColumn('region', function ($query, $keyword) {
                $query->where('regions.nom', 'like', "%" . $keyword . "%");
            });



            $datatables->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });
        }
        return $datatables->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     *     
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        return response()->json($this->destroy($id));
    }
}
