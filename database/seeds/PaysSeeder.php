<?php

use Crockett\CsvSeeder\CsvSeeder;

class PaysSeeder extends CsvSeeder
{

    public function __construct()
    {

        $this->filename = base_path('database/seeds/csv/pays.csv');
        $this->table    = 'pays';
    }

    public function run()
    {
        // $this->table    = 'pays';
        // $this->filename = base_path('database/seeds/csv/pays.csv');
        // $this->mapping  = [
        //     0 => 'nom_fr',
        //     1 => 'alpha3',
        //     2 => 'nom_arab',
        // ];
        // // $this->aliases = [
        // //     'nom_fr'   => 'nom_fr',
        // //     'nom_arab' => 'nom_arab',
        // //     'alpha3'   => 'alpha3',
        // // ];
        // $this->delimiter = ',';
        // $model_guard     = false;
        parent::run();
    }
}
