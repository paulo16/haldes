<?php

use Faker as Faker;
use Illuminate\Database\Seeder;

class HaldeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\Base($faker));
        $region   = DB::table('regions')->where('nom', "Marrakech - Safi")->first();
        $province = DB::table('province_prefecture')->where('nom', "Kelâa des Sraghna")->first();

        for ($i = 0; $i < 20; $i++) {
            DB::table('haldes')->insert([
                'nom'                  => $faker->name,
                'coordonnees'          => '34.98- 23.78',
                'province_id'          => $province->id,
                'region_id'            => $region->id,
                'qte_dechets'          => $faker->randomNumber($nbDigits = null, $strict = false),
                'info_complementaires' => $faker->sentence(20),
            ]);
        }
    }
}
