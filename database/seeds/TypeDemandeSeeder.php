<?php

use Illuminate\Database\Seeder;

class TypeDemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typedemandes')->insert([
            //table Etablissement
            [
                'nom' => "DEMANDE HALDES-TERRILS",
            ],
        ]);
    }
}
