<?php

namespace App\Http\Controllers;

use App\Halde;
use App\Region;
use App\Services\HaldeService;
use App\Substanceexploitee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Debugbar;
use Illuminate\Support\Facades\Storage;

class HaldeController extends Controller
{

    public function __construct(HaldeService $haldeService)
    {
        $this->haldeService   = $haldeService;
    }
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
        $halde->substance_noms = $request->get('substance') ? $request->get('substance') : '';
        $halde->nom = $request->get('nom') ? $request->get('nom') : '';
        $halde->coordonnees = $request->get('coordonnees') ? $request->get('coordonnees') : '';
        $halde->region_id = $request->get('region') ? $request->get('region') : '';
        $halde->province_noms = $request->get('province') ? $request->get('province') : '';
        $halde->qte_dechets = $request->get('dechets') ? $request->get('dechets') : '';
        $halde->info_complementaires = $request->get('info_comp') ? $request->get('info_comp') : '';

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

    public function datahaldesbackend(Request $request)
    { 
        return $this->haldeService->listehaldesback($request);
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
