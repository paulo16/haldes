<?php

namespace App\Http\Controllers;

use App\Halde;
use App\Imports\HaldesImport;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelcsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExport()
    {
        return view('backend.haldes.add-excel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel($type)
    {
        $data = Halde::get()->toArray();

        return Excel::create('itsolutionstuff_example', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        try {
            $request->validate([
                'nom_publication' => 'required|unique:groupehaldes|max:255',
                'import_file' => 'required',
                'date_publication' => 'required|date'
            ]);

            $path = request()->file('import_file');
            $haldeimport = new HaldesImport;
            $haldeimport->date_publication = Carbon::parse($request->get('date_publication'));
            $haldeimport->nom_publication = $request->get('nom_publication');
            $haldeimport->disponible = true;
            //date fin publication
            $haldeimport->date_fin_publication = Carbon::now()->addMonths(4);


            Excel::import($haldeimport, $path);


            return back()->with('success', 'Données bien inserées.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return Redirect::back()->withErrors($failures);
        }
    }
}
