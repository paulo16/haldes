<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PaysSeeder::class);
        $this->call(TypeDemandeSeeder::class);
        $this->call(TypePersonneSeeder::class);
        $this->call(RegionMarocSeeder::class);
        $this->call(TypeStructureSeeder::class);
        $this->call(ProvinceProfectureSeeder::class);
        $this->call(HaldeSeeder::class);
    }
}
