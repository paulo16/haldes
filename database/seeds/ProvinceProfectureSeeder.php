<?php

use App\Region;
use Illuminate\Database\Seeder;

class ProvinceProfectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province_prefecture')->delete();
        //role
        $region1  = Region::where('nom', "Tanger – Tétouan – Al Hoceima")->first();
        $region2  = Region::where('nom', "L'oriental")->first();
        $region3  = Region::where('nom', "Fès - Meknès")->first();
        $region4  = Region::where('nom', "Rabat - Salé- Kénitra")->first();
        $region5  = Region::where('nom', "Béni Mellal- Khénifra")->first();
        $region6  = Region::where('nom', "Casablanca- Settat")->first();
        $region7  = Region::where('nom', "Marrakech - Safi")->first();
        $region8  = Region::where('nom', "Darâa - Tafilalet")->first();
        $region9  = Region::where('nom', "Souss - Massa")->first();
        $region10 = Region::where('nom', "Guelmim - Oued Noun")->first();
        $region11 = Region::where('nom', "Laâyoune - Sakia El Hamra")->first();
        $region12 = Region::where('nom', "Dakhla-Oued Eddahab")->first();

        DB::table('province_prefecture')->insert([
            //table Etablissement
            [
                'nom'       => "Tanger-Assilah",
                'region_id' =>  $region1->id,
            ],
            [
                'nom'       => "M'diq-Fnideq",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Tétouan",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Fahs-Anjra",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Larache",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Al Hoceima",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Chefchaouen",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Ouazzane",
                'region_id' => $region1->id,
            ],
            [
                'nom'       => "Oujda-Angad",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Nador",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Driouch",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Jerada",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Berkan",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Taourirt",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Guercif",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "Figuig",
                'region_id' => $region2->id,
            ],
            [
                'nom'       => "​Fès",
                'region_id' => $region3->id,
            ], [
                'nom'       => "Meknès",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "El Hajeb",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "Ifrane",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "Moulay Yacoub",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "Sefrou",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "Boulemane",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "Taounate",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "Taza",
                'region_id' => $region3->id,
            ],
            [
                'nom'       => "​Rabat",
                'region_id' => $region4->id,
            ],
            [
                'nom'       => "Salé",
                'region_id' => $region4->id,
            ],
            [
                'nom'       => "Skhirate-Témara",
                'region_id' => $region4->id,
            ],
            [
                'nom'       => "Kénitra",
                'region_id' => $region4->id,
            ], [
                'nom'       => "Khémisset",
                'region_id' => $region4->id,
            ],
            [
                'nom'       => "Sidi Kacem",
                'region_id' => $region4->id,
            ],
            [
                'nom'       => "Sidi Slimane",
                'region_id' => $region4->id,
            ],
            [
                'nom'       => "Béni Mellal",
                'region_id' => $region5->id,
            ], [
                'nom'       => "Azilal",
                'region_id' => $region5->id,
            ],
            [
                'nom'       => "Fquih Ben Salah",
                'region_id' => $region5->id,
            ],
            [
                'nom'       => "Khénifra",
                'region_id' => $region5->id,
            ],
            [
                'nom'       => "Khouribga​",
                'region_id' => $region5->id,
            ],
            [
                'nom'       => "Casablanca",
                'region_id' => $region6->id,
            ], [
                'nom'       => "Mohammadia",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "El Jadida",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Nouaceur",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Médiouna",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Benslimane",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Berrechid",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Settat",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Sidi Bennour",
                'region_id' => $region6->id,
            ],
            [
                'nom'       => "Marrakech",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Chichaoua",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Al Haouz",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Kelâa des Sraghna",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Essaouira",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Rehamna",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Safi",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Youssoufia",
                'region_id' => $region7->id,
            ],
            [
                'nom'       => "Errachidia",
                'region_id' => $region8->id,
            ],
            [
                'nom'       => "Ouarzazate",
                'region_id' => $region8->id,
            ],
            [
                'nom'       => "Midelt",
                'region_id' => $region8->id,
            ],
            [
                'nom'       => "Tinghir",
                'region_id' => $region8->id,
            ],
            [
                'nom'       => "Zagora​",
                'region_id' => $region8->id,
            ],
            [
                'nom'       => "Agadir Ida-Ou-Tanane",
                'region_id' => $region9->id,
            ],
            [
                'nom'       => "Inezgane-Aït Melloul",
                'region_id' => $region9->id,
            ],
            [
                'nom'       => "Chtouka-Aït Baha",
                'region_id' => $region9->id,
            ],
            [
                'nom'       => "Taroudannt",
                'region_id' => $region9->id,
            ],
            [
                'nom'       => "Tiznit",
                'region_id' => $region9->id,
            ],
            [
                'nom'       => "Tata",
                'region_id' => $region9->id,
            ],
            [
                'nom'       => "​Guelmim",
                'region_id' => $region10->id,
            ],
            [
                'nom'       => "Assa-Zag",
                'region_id' => $region10->id,
            ],
            [
                'nom'       => "Tan-Tan",
                'region_id' => $region10->id,
            ],
            [
                'nom'       => "Sidi Ifni",
                'region_id' => $region10->id,
            ],
            [
                'nom'       => "Laâyoune",
                'region_id' => $region11->id,
            ],
            [
                'nom'       => "Boujdour",
                'region_id' => $region11->id,
            ],
            [
                'nom'       => "Tarfaya",
                'region_id' => $region11->id,
            ],
            [
                'nom'       => "Es-Semara​",
                'region_id' => $region11->id,
            ],
            [
                'nom'       => "Oued Ed-Dahab",
                'region_id' => $region12->id,
            ],
            [
                'nom'       => "Aousserd​",
                'region_id' => $region12->id,
            ],
        ]);

    }
}
