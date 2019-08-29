<?php

use Illuminate\Database\Seeder;

class RegionMarocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();
        DB::table('regions')->insert([
            //table Etablissement
            [
                'nom'       => "Tanger – Tétouan – Al Hoceima",
                'chef_lieu' => "Tanger - Assilah",
            ],
            [
                'nom'       => "L'oriental",
                'chef_lieu' => "Oujda-Angad",
            ],
            [
                'nom'       => "Fès - Meknès",
                'chef_lieu' => "Fès",
            ],
            [
                'nom'       => "Rabat - Salé- Kénitra",
                'chef_lieu' => "​Rabat",
            ],
            [
                'nom'       => "Béni Mellal- Khénifra",
                'chef_lieu' => "​Béni Mellal",
            ],
            [
                'nom'       => "Casablanca- Settat",
                'chef_lieu' => "​Casablanca",
            ],
            [
                'nom'       => "Marrakech - Safi",
                'chef_lieu' => "​Marrakech",
            ],
            [
                'nom'       => "Souss - Massa",
                'chef_lieu' => "​Agadir Ida Ou Tanane",
            ],
            [
                'nom'       => "Darâa - Tafilalet",
                'chef_lieu' => "​Errachidia",
            ],
            [
                'nom'       => "Guelmim - Oued Noun",
                'chef_lieu' => "​Guelmim",
            ],
            [
                'nom'       => "Laâyoune - Sakia El Hamra",
                'chef_lieu' => "​Laâyoune",
            ],
            [
                'nom'       => "Dakhla-Oued Eddahab",
                'chef_lieu' => "​Oued Eddahab",
            ],

        ]);
    }
}
