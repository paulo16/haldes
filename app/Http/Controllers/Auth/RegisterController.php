<?php

namespace App\Http\Controllers\Auth;

use App\Entreprise;
use App\Http\Controllers\Controller;
use App\Pays;
use App\Personne;
use App\Structure;
use App\Typepersonne;
use App\Typestructure;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        if ($nomstructure->nom == "ENTREPRISE") {
            return Validator::make($data, [
                'nom_responsable'         => ['required', 'string', 'max:255'],
                'prenom'                  => ['required', 'string', 'max:255'],
                'nationalite_responsable' => ['required', 'numeric'],
                'adresse_responsable'     => ['required', 'string', 'max:255'],
                'mobile'                  => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'                => ['required', 'string', 'min:8', 'confirmed'],
                'nom_entreprise'          => ['required', 'string', 'max:255'],
                'siege_entreprise'        => ['required', 'string', 'max:255'],
                'nationalite_entreprise'  => ['required', 'numeric'],
                'capital_entreprise'      => ['required', 'numeric'],
                'registre_commerce'       => ['required', 'string', 'max:255'],
                'nombre_personne'         => ['required', 'numeric'],
                'type_structure'          => ['required', 'string', 'max:255'],
                'raison_social'           => ['required', 'string', 'max:255'],
                'ice'                     => ['required', 'string', 'max:255'],
                'cnss'                    => ['required', 'string', 'max:255'],
                'identifiant_fiscal'      => ['required', 'string', 'max:255'],
                'cin'                     => ['required', 'string', 'max:255'],
                'date_creation'           => 'required|date',
            ]);
        } else {
            return Validator::make($data, [
                'nom_responsable'         => ['required', 'string', 'max:255'],
                'prenom'                  => ['required', 'string', 'max:255'],
                'nationalite_responsable' => ['required', 'numeric'],
                'adresse_responsable'     => ['required', 'string', 'max:255'],
                'mobile'                  => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'                => ['required', 'string', 'min:8', 'confirmed'],
                'nom_entreprise'          => ['required', 'string', 'max:255'],
                'siege_entreprise'        => ['required', 'string', 'max:255'],
                'nationalite_entreprise'  => ['required', 'numeric'],
                'registre_commerce'       => ['required', 'string', 'max:255'],
                'nombre_personne'         => ['required', 'numeric'],
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
        $user = User::create([
            'name'     => $data['nom_responsable'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::firstOrCreate(array('name' => 'externe'));
        \DB::table('role_user')->insert([
            'user_id'              => $user->id,
            'role_id'             => $role->id,
        ]);

        if ($user) {

            $structure = Structure::create([
                'nom'                     => $data['nom_entreprise'],
                'siege'                   => $data['siege_entreprise'],
                'nationalite'             => $data['nationalite_entreprise'],
                'telephone'               => $data['fixe'],
                'date_creation_structure' => $data['date_creation'],
                'fax'                     => $data['fax_entreprise'],
                'typestructure_id'        => $data['type_structure'],
            ]);



            if ($structure) {

                $entreprise = Entreprise::create([
                    'raison_social'       => $data['raison_social'],
                    'registre_commerce'   => $data['registre_commerce'],
                    'nombre_actionnaires' => $data['nombre_personne'],
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
                    'structure_id'   => $structure->id,
                    'user_id'        => $user->id,
                ]);
            }
        }

        if ($user && $structure && $entreprise && $personne) {

            return $user;
        } else {

            User::where('id', $user->id)->delete();
            Structure::where('id', $structure->id)->delete();
            Entreprise::where('id', $entreprise->id)->delete();
            personne::where('id', $personne->id)->delete();

            return null;
        }
    }
}
