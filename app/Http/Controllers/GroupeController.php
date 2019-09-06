<?php

namespace App\Http\Controllers;

use App\Groupe;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $groupe->disponible = $request->get('disponible');


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
        return $this->userService->delete($id);
    }

    public function data(Request $request)
    {
        $groupehaldes = \DB::table('groupehaldes')->select([
            'groupehaldes.id as id', 'groupehaldes.nom_publication as nom_publication', 'groupehaldes.date_publication as date_publication',
            'groupehaldes.date_fin_publication as date_fin_publication', 'groupehaldes.disponible as disponible', 'groupehaldes.created_at as created_at'
        ]);

        $datatables = DataTables::of($groupehaldes)
            ->addColumn('action', function ($model) {
                $dispo = '
                <input type="checkbox" class="custom-control-input" id="publier">
                <label class="custom-control-label" for="customSwitch2">publier ?</label>
            ';
                $url_edit = '<a href=":url" class="green" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                $edit = route('groupes.edit', $model->id);
                $del = str_replace(":id", $model->id, $delete);
                $url_edit = str_replace(":url", $edit, $url_edit);
                $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $url_edit . '&nbsp;' . $del .'&nbsp;&nbsp;'. $dispo. '<div>';
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
}
