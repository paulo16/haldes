<?php

use Illuminate\Database\Seeder;

class TypeStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typestructures')->insert([
            //table Etablissement
            [
                'nom' => "ENTREPRISE",
            ],
            [
                'nom' => "COOPERATIVE",
            ],
        ]);
    }
}
