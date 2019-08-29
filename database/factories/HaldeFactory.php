<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Halde;
use Faker\Generator as Faker;

$factory->define(Halde::class, function (Faker $faker) {

    $region   = DB::table('regions')->where('nom', "Marrakech - Safi")->first();
    $province = DB::table('province_prefecture')->where('nom', "Kelâa des Sraghna")->first();

    for ($i = 0; $i < 20; $i++) {
        DB::table('province_prefecture')->insert([
            'nom'                  => $faker->name,
            'coordonnees'          => $faker->address()->latitude+'-'+$faker->address()->latitude,
            'province'             => $province->nom,
            'region'               => $region->nom,
            'qte_dechets'          => $faker->randomDigitNotNull;,
            'info_complementaires' => $faker->unique()->safeEmail,
        ]);
    }
});
