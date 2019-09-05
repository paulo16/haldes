<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemandeWorflowUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $worflow = DB::table('idsdemandesprisparworflow')->insert([
            'type'            => "demande",
            'id_dernier_update'        => 0,
        ]);
    }
}
