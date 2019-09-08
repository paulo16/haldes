<?php

namespace App\Http\Controllers\Auth;

use App\Entreprise;
use App\Http\Controllers\Controller;
use App\Pays;
use App\Role;
use App\Region;
use App\Actionnaire;
use App\Personne;
use App\Structure;
use App\Typepersonne;
use App\Typestructure;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'profil/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {

        $typestructures = Typestructure::select()->orderBy('nom', 'DESC')->get()->toArray();
        $typepersonnes  = Typepersonne::select()->orderBy('nom', 'asc')->get()->toArray();
        $pays           = Pays::select()->orderBy('nom_fr', 'asc')->get()->toArray();
        return view('auth.register', compact('typepersonnes', 'typestructures', 'pays'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $nomstructure = Typestructure::select()->where('id', '=', $data['type_structure'])->first();

        //$paysmaroc = Pays::select()->where('nom_fr', '=','Maroc')->first();




        if ($nomstructure->nom == "ENTREPRISE") {
            return Validator::make($data, [
                'nom_responsable'         => ['required', 'string', 'max:255'],
                'prenom'                  => ['required', 'string', 'max:255'],
                'nationalite_responsable' => ['required', 'numeric'],
                'adresse_responsable'     => ['required', 'string', 'max:255'],
                'mobile'                  => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'                => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
                'siege_entreprise'        => ['required', 'string', 'max:255'],
                'nationalite_entreprise'  => ['required', 'numeric'],
                'capital_entreprise'      => ['required', 'numeric'],
                'registre_commerce'       => ['required', 'string', 'max:255'],
                'type_structure'          => ['required', 'string', 'max:255'],
                'raison_social'           => ['required', 'string', 'max:255'],
                'ice'                     => ['required', 'string', 'max:255'],
                'cnss'                    => ['required', 'string', 'max:255'],
                'identifiant_fiscal'      => ['required', 'string', 'max:255'],
                'cin'                     => ['required', 'string', 'max:255'],
                'date_creation'           => 'required|date',
                'nom_gerant'                     => ['required', 'string', 'max:255'],
                'prenom_gerant'                     => ['required', 'string', 'max:255'],
                'adresse_gerant'                     => ['required', 'string', 'max:255'],




            ]);
        } else {
            return Validator::make($data, [
                'nom_responsable'         => ['required', 'string', 'max:255'],
                'prenom'                  => ['required', 'string', 'max:255'],
                'nationalite_responsable' => ['required', 'numeric'],
                'adresse_responsable'     => ['required', 'string', 'max:255'],
                'capital_entreprise'      => ['required', 'numeric'],
                'mobile'                  => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'                => ['required', 'string', 'min:8', 'confirmed'],
                'siege_entreprise'        => ['required', 'string', 'max:255'],
                'nationalite_entreprise'  => ['required', 'numeric'],
                'registre_commerce'       => ['required', 'string', 'max:255'],
                'type_structure'          => ['required', 'string', 'max:255'],
                'cin'                     => ['required', 'string', 'max:255'],
                'date_creation'           => 'required|date',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();

        try {

            $user =  User::create([
                'name'     => $data['nom_responsable'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $role = Role::firstOrCreate(array('name' => 'externe'));
            \DB::table('role_user')->insert([
                'user_id'              => $user->id,
                'role_id'             => $role->id,
            ]);



            $structure = Structure::create([
                'nom'                     => $data['raison_social'],
                'siege'                   => $data['siege_entreprise'],
                'nationalite'             => $data['nationalite_entreprise'],
                'telephone'               => $data['fixe'],
                'date_creation_structure' => $data['date_creation'],
                'fax'                     => $data['fax_entreprise'],
                'capital'                     => $data['capital_entreprise'],
                'typestructure_id'        => $data['type_structure'],
            ]);



            $entreprise = Entreprise::create([
                'raison_social'       => $data['raison_social'],
                'nom_gerant'       => $data['nom_gerant'],
                'prenom_gerant'       => $data['prenom_gerant'],
                'email_gerant'       => $data['email_gerant'],
                'tel_gerant'       => isset($data['tel_gerant']) ? $data['tel_gerant'] : '',
                'adresse_gerant'       => isset($data['adresse_gerant']) ? $data['adresse_gerant'] : '',
                'registre_commerce'   => $data['registre_commerce'],
                'nombre_actionnaires' => isset($data['nombre_personne']) ? $data['nombre_personne'] : 0,
                'ice'                 => $data['ice'],
                'cnss'                => $data['cnss'],
                'if'                  => $data['identifiant_fiscal'],
                'structure_id'        => $structure->id,
            ]);

            $personne = Personne::create([
                'nom'            => $data['nom_responsable'],
                'prenom'         => $data['prenom'],
                'nationalite'    => $data['nationalite_responsable'],
                'adresse'        => $data['adresse_responsable'],
                'telephone_fixe' => $data['fixe'],
                'mobile'         => $data['mobile'],
                'cin'            => $data['cin'],
                'typepersonne_id'   => $data['type_personne'],
                'structure_id'   => $structure->id,
                'user_id'        => $user->id,
            ]);


            // Ajout d'actionnaire

            // if (
            //     isset($data["input_nom"]) && is_array($data["input_nom"]) &&
            //     isset($data["input_prenom"]) && is_array($data["input_prenom"]) &&
            //     isset($data["input_part"]) && is_array($data["input_part"])
            // ) {



            //     $input_noms = array_filter($data["input_nom"]);
            //     $input_prenoms = array_filter($data["input_prenom"]);
            //     $input_parts = array_filter($data["input_part"]);
            //     $taille = count($input_noms);

            //     $array_actionnaires = array();
            //     for ($i = 0; $i < $taille; $i++) {
            //         $array_actionnaires[] = [
            //             'nom'       => $input_noms[$i],
            //             'prenom'   => $input_prenoms[$i],
            //             'part_social' => $input_parts[$i],
            //             'entreprise_id' => $entreprise->id,
            //         ];
            //     }
            //     //dd($array_actionnaires);

            //     DB::table('actionnaires')->insert($array_actionnaires);
            // }


            DB::commit();
            //all good
        } catch (\Exception $e) {
            DB::rollback();
            //something went wrong
        }

        return $user;
    }
}
