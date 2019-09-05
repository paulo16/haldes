<?php

namespace App\Imports;

use App\Halde;
use App\Region;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class HaldesImport implements OnEachRow, WithBatchInserts, WithValidation
{

    public $errors = [];
    public $datesegments = [];
    public $date_publication;
    public $date_fin_publication;

    public function datesegment()
    {
        $datenow      = new \DateTime();
        $datenow      = $datenow->format('Y-m-d H:i:s');
        $date_day     = date('d', strtotime($datenow));
        $date_month   = date('m', strtotime($datenow));
        $date_year    = date('Y', strtotime($datenow));
        $date_heure   = date('H', strtotime($datenow));
        $date_minute  = date('i', strtotime($datenow));
        $date_seconde = date('s', strtotime($datenow));



        return ["jour" => $date_day, "mois" => $date_month, "heure" => $date_heure, "minutes" => $date_minute, "seconde" => $date_seconde, "annee" => $date_year];
    }

    public function onRow(Row $row)
    {

        $rowIndex = $row->getIndex();
        $row      = $row->toArray();


        if ($rowIndex != 1) {
            // $validator = Validator::make($row, $this->rules(), $this->customValidationAttributes());
            // if ($validator->fails()) {
            //     foreach ($validator->errors()->messages() as $messages) {
            //         foreach ($messages as $error) {
            //             // accumulating errors:
            //             $this->errors[] = $error;
            //         }
            //     }
            //     return  redirect()->back()->withErrors($this->errors);
            // } else {
            $region = Region::firstOrCreate([
                'nom' => trim($row[5]),
            ]);

            Halde::firstOrCreate([
                'nom' => trim($row[0]),
                'nom_publication' => 'publication_' . $this->datesegments['annee'] . $this->datesegments['mois'] . $this->datesegments['jour'] . $this->datesegments['heure'] . $this->datesegments['minutes'] . $this->datesegments['seconde'],
                'coordonnees' => trim($row[1]) . '-' . trim($row[2]),
                'province_noms' => trim($row[4]),
                'substance_noms' => trim($row[6]),
                'region_id' => $region->id,
                'carte' => trim($row[3]),
                'date_publication' => $this->date_publication,
                'date_fin_publication' => $this->date_fin_publication,
                'carte' => trim($row[3]),
                'qte_dechets' => $row[7],
                'info_complementaires' => $row[8],
            ]);
        } else {
            $this->datesegments = $this->datesegment();
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            'site' => 'required',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'carte' => 'required|max:255',
            'province' => 'required',
            'region' => 'required|max:255',
            'dechets' => 'required',
            'substances' => 'required',

        ];
    }

    public function customValidationAttributes()
    {
        return [
            'site.required' => trans('contenu.importhalde.site'),
            'x.required' => trans('contenu.importhalde.x'),
            'y.required' => trans('contenu.importhalde.y'),
            'carte.required' => trans('contenu.importhalde.carte'),
            'province.required' => trans('contenu.importhalde.province'),
            'region.required' => trans('contenu.importhalde.region'),
            'dechets.required' => trans('contenu.importhalde.dechets'),
            'substances.required' => trans('contenu.importhalde.substances'),
        ];
    }
}