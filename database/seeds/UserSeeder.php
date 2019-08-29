<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Personne;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role               = new Role();
        $role->name         = 'admin';
        $role->display_name = 'Administration'; // optional
        $role->description  = "Utilisateur pouvant créer des Haldes et ajouter d'autres"; // optional
        $role->save();

        $role2               = new Role();
        $role2->name         = 'externe';
        $role2->display_name = 'externe'; // optional
        $role2->description  = "role pour un Representant d'une entreprise externe"; // optional
        $role2->save();

        $datenow      = new \DateTime();
        $user = User::create([
            'name'              => 'Mr Paul',
            'email'             => 'paul@gmail.com',
            'password'          => Hash::make('password'),
            'email_verified_at' => $datenow,
        ]);
        $role_user = DB::table('role_user')->insert([
            'user_id'              => $user->id,
            'role_id'             => $role->id,
        ]);

        $personne = Personne::create([
            'nom'            => "Paul test",
            'prenom'         => "prenom test",
            'adresse'        => "RABAT AGDAL",
            'telephone_fixe' => "04387654338",
            'mobile'         => "0679004433",
            'cin'            => "E03457J",
            'user_id'        => $user->id,
        ]);
    }
}
