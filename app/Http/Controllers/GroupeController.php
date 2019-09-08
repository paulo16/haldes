<?php

namespace App\Http\Controllers;

use App\Groupe;
use App\Halde;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.groupes.list");
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $groupe = Groupe::find($id);

        return view('backend.groupes.edit', compact('groupe'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'nom_publication' => 'required|max:255',
            'date_publication' => ['required', 'regex:/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9]).([0-9]{2})$/'],
            'date_fin_publication' => ['required', 'regex:/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9]).([0-9]{2})$/'],
            'disponible' => 'required',
        ]);

        $groupe = Groupe::find($id);
        $groupe->nom_publication = $request->get('nom_publication');
        $groupe->date_publication = $request->get('date_publication');
        $groupe->date_fin_publication = $request->get('date_fin_publication');
        $groupe->disponible = $request->get('disponible') ? 1 : 0;


        return $groupe->save() ? redirect()->route('groupes.index') : redirect()->back();
    }

    /**
     *     
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request, $id)
    {
        return  response()->json($this->destroy($id));
    }

    /**
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reponse = [];

        DB::beginTransaction();

        try {

            $haldes = Halde::join('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')
                ->join('demandes', 'haldes.id', '=', 'demandes.halde_id')
                ->select('demandes.nom')
                ->where('haldes.groupe_id', "=", $id)
                ->get();

            if (count($haldes) == 0) {
                foreach ($haldes as $halde) {

                    $halde->disponible = $halde->disponible  == 1 ? 0 : 1;
                    $halde->save();
                }

                $groupe = Groupe::find($id);
                $groupe->delete();
                $reponse = ["reponse" => "ok"];
            } else {
                $reponse = ["reponse" => "impossible"];
                return $reponse;
            }

            DB::commit();
            //all good
        } catch (\Exception $e) {
            DB::rollback();
            //something went wrong
        }

        return $reponse;
    }

    public function data(Request $request)
    {
        $groupehaldes = \DB::table('groupehaldes')->select([
            'groupehaldes.id as id', 'groupehaldes.nom_publication as nom_publication', 'groupehaldes.date_publication as date_publication',
            'groupehaldes.date_fin_publication as date_fin_publication', 'groupehaldes.disponible as disponible', 'groupehaldes.created_at as created_at'
        ]);

        $datatables = DataTables::of($groupehaldes)
            ->addColumn('action', function ($model) {

                $checked = $model->disponible ? "checked" : "";

                $dispo = '
                <input data-id=":id" type="radio" class="custom-control-input publier" ' . $checked . ' id="publier">
                <label class="custom-control-label" for="customSwitch2">publier ?</label>
            ';
                $url_edit = '<a href=":url" class="green" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                $edit = route('groupes.edit', $model->id);
                $del = str_replace(":id", $model->id, $delete);
                $dispo = str_replace(":id", $model->id, $dispo);
                $url_edit = str_replace(":url", $edit, $url_edit);
                $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $url_edit . '&nbsp;' . $del . '&nbsp;&nbsp;' . $dispo . '<div>';
                return $action;
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
            });
        // les filtres 
        // Global search function
        if ($keyword = $request->get('search')['value']) {
            //Debugbar::info($keyword);
            // override groupes.name global search
            $datatables->filterColumn('nom', function ($query, $keyword) {
                $query->where('groupes.nom', 'like', "%" . $keyword . "%");
            });

            $datatables->filterColumn('date_publication', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(groupes.date_publication,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });

            $datatables->filterColumn('date_fin_publication', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(groupes.date_fin_publication,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });

            $datatables->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });
        }
        return $datatables->make(true);
    }

    /**
     *     
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function publier(Request $request, $id)
    {
        $reponse=[];
        DB::beginTransaction();

        try {

            $haldescheck = Halde::join('groupehaldes', 'groupehaldes.id', '=', 'haldes.groupe_id')
                ->join('demandes', 'haldes.id', '=', 'demandes.halde_id')
                ->select('demandes.nom')
                ->where('haldes.groupe_id', "=", $id)
                ->get();
                
            if (count($haldescheck) == 0) {
                $haldes = Halde::where('groupe_id', "=", $id)->get();


                foreach ($haldes as $halde) {

                    $halde->disponible = $halde->disponible  == 1 ? 0 : 1;
                    $halde->save();
                }

                $groupe = Groupe::find($id);
                $groupe->disponible = $groupe->disponible == 1 ? 0 : 1;
                $groupe->save();
                $reponse = ["reponse" => "ok"];
            } else {
                $reponse = ["reponse" => "impossible"];
            }
            DB::commit();
            //all good
        } catch (\Exception $e) {
            DB::rollback();
            //something went wrong
        }

        return  response()->json($reponse);
    }
}
