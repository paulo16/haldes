<?php

use Illuminate\Database\Seeder;

class TypePersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typepersonnes')->insert([
            //table Etablissement
            [
                'nom' => "DIRECTEUR",
            ],
            [
                'nom' => "RESPONSABLE",
            ],
            [
                'nom' => "REPRESENTANT",
            ],
            [
                'nom' => "GERANT",
            ],
        ]);
    }
}
