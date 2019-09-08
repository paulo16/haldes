<?php

namespace App\Http\Controllers;

use App\Entreprise;
use App\Pays;
use App\Personne;
use App\Structure;
use App\Typepersonne;
use App\Typestructure;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facade as Debugbar;

class ProfilController extends Controller
{
    public function index()
    {
        $currentuser    = Auth::user();
        $typestructures = Typestructure::select()->orderBy('nom', 'asc')->get()->toArray();
        $typepersonnes  = Typepersonne::select()->orderBy('nom', 'asc')->get()->toArray();
        $pays           = Pays::select()->orderBy('nom_fr', 'asc')->get()->toArray();


        $personne = Personne::leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
            ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
            ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
            ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
            ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
            ->select(
                'personnes.id as id',
                'personnes.nom as nom_p',
                'personnes.prenom as prenom_p',
                'pp.nom_fr as nationalite_p',
                'personnes.adresse as adresse_p',
                'personnes.telephone_fixe as fixe_p',
                'personnes.mobile as mobile_p',
                'structures.nom as nom_s',
                'structures.siege as siege',
                'structures.capital as capital',
                'typestructures.nom as type_s',
                'ps.nom_fr as nationalite_s',
                'entreprises.raison_social as raison_social',
                'entreprises.registre_commerce as registre_commerce',
                'entreprises.nombre_actionnaires as nombre_actionnaires',
                'entreprises.ice as ice',
                'entreprises.cnss as cnss',
                'entreprises.if as if',
                'users.email as email'
            )
            ->where('personnes.user_id', $currentuser->id)
            ->first();

        $modif = $this->timepass($personne->id) !== null && $this->timepass($personne->id)  <= 4 ? false : true;

        //dd($personne);

        return view('frontend.profil', compact('personne', 'modif', 'typestructures', 'typepersonnes', 'pays'));
    }

    public function edit($id)
    {
        $currentuser    = Auth::user();
        $typestructures = Typestructure::select()->orderBy('nom', 'asc')->get()->toArray();
        $typepersonnes  = Typepersonne::select()->orderBy('nom', 'asc')->get()->toArray();
        $pays           = Pays::select()->orderBy('nom_fr', 'asc')->get()->toArray();

        $personne = Personne::leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
            ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
            ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
            ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
            ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
            ->select(
                'personnes.id as id',
                'personnes.nom as nom_p',
                'personnes.prenom as prenom_p',
                'pp.nom_fr as nationalite_p',
                'personnes.adresse as adresse_p',
                'personnes.telephone_fixe as fixe_p',
                'personnes.mobile as mobile_p',
                'personnes.typepersonne_id as typepersonne_id',
                'personnes.cin as cin',
                'structures.nom as nom_s',
                'structures.siege as siege',
                'structures.fax as fax_strucure',
                'structures.nationalite as nationalite_id',
                'structures.capital as capital',
                'structures.date_creation_structure as date_creation',
                'structures.typestructure_id as typestructure_id',
                'typestructures.nom as type_s',
                'ps.nom_fr as nationalite_s',
                'entreprises.raison_social as raison_social',
                'entreprises.registre_commerce as registre_commerce',
                'entreprises.nombre_actionnaires as nombre_actionnaires',
                'entreprises.ice as ice',
                'entreprises.cnss as cnss',
                'entreprises.if as if',
                'entreprises.nom_gerant as nom_gerant',
                'entreprises.prenom_gerant as prenom_gerant',
                'entreprises.email_gerant as email_gerant',
                'entreprises.adresse_gerant as adresse_gerant',
                'entreprises.tel_gerant as tel_gerant',
                'users.email as email'
            )
            ->where('personnes.user_id', $currentuser->id)
            ->get()
            ->first();

        //dd($personne);

        return view('frontend.update-personne', compact('personne', 'typestructures', 'typepersonnes', 'pays'));
    }

    public function update(Request $request, $id)
    {
        $nomstructure = Typestructure::select()->where('id', '=', $request['type_structure'])->first();


        if ($nomstructure->nom == "ENTREPRISE") {
            $this->validate($request, [
                'nom_responsable'         => ['required', 'string', 'max:255'],
                'prenom'                  => ['required', 'string', 'max:255'],
                'nationalite_responsable' => ['required', 'numeric'],
                'adresse_responsable'     => ['required', 'string', 'max:255'],
                'mobile'                  => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255'],
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
            $this->validate($request, [
                'raison_social'           => ['required', 'string', 'max:255'],
                'nom_responsable'         => ['required', 'string', 'max:255'],
                'prenom'                  => ['required', 'string', 'max:255'],
                'nationalite_responsable' => ['required', 'numeric'],
                'adresse_responsable'     => ['required', 'string', 'max:255'],
                'capital_entreprise'      => ['required', 'numeric'],
                'mobile'                  => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255'],
                'siege_entreprise'        => ['required', 'string', 'max:255'],
                'nationalite_entreprise'  => ['required', 'numeric'],
                'registre_commerce'       => ['required', 'string', 'max:255'],
                'type_structure'          => ['required', 'string', 'max:255'],
                'cin'                     => ['required', 'string', 'max:255'],
                'date_creation'           => 'required|date',
            ]);
        }

        // DB::beginTransaction();

        // try {

            $personne1 = Personne::where('id',$id)->first();

            $user =  User::where('id', $personne1->user_id)->first();

            $user->name = $request['nom_responsable'];
            //$user->email    = $request['email'];
            $user->save();

            $structure = Structure::where('id', $personne1->structure_id)->first();
            //dd($personne1);
            $structure->nom  = $request['raison_social'];
            $structure->siege = $request['siege_entreprise'];
            $structure->nationalite  = $request['nationalite_entreprise'];
            $structure->telephone               = $request['fixe'];
            $structure->date_creation_structure = $request['date_creation'];
            $structure->fax                     = $request['fax_entreprise'];
            $structure->capital                    = $request['capital_entreprise'];
            $structure->typestructure_id       = $request['type_structure'];
            $structure->save();


            $entreprise = Entreprise::where('structure_id', $personne1->structure_id)->first();
            $entreprise->raison_social       = $request['raison_social'];
            $entreprise->nom_gerant     = $request['nom_gerant'];
            $entreprise->prenom_gerant      = $request['prenom_gerant'];
            $entreprise->email_gerant       = $request['email_gerant'];
            $entreprise->tel_gerant      = $request['tel_gerant'];
            $entreprise->adresse_gerant      = $request['adresse_gerant'];
            $entreprise->registre_commerce   = $request['registre_commerce'];
            $entreprise->ice                 = $request['ice'];
            $entreprise->cnss                = $request['cnss'];
            $entreprise->if                  = $request['identifiant_fiscal'];
            $entreprise->save();


            $personne1->nom = $request['nom_responsable'];
            $personne1->prenom         = $request['prenom'];
            $personne1->nationalite    = $request['nationalite_responsable'];
            $personne1->adresse        = $request['adresse_responsable'];
            $personne1->telephone_fixe = $request['fixe'];
            $personne1->mobile         = $request['mobile'];
            $personne1->cin            = $request['cin'];
            $personne1->typepersonne_id            = $request['type_personne'];
            $personne1->save();

        //     DB::commit();
        // } catch (\Exception $e) {
        //     Debugbar::info($e);
        //     DB::rollback();
        //     //something went wrong
        // }

        $currentuser    = Auth::user();
        $typestructures = Typestructure::select()->orderBy('nom', 'asc')->get()->toArray();
        $typepersonnes  = Typepersonne::select()->orderBy('nom', 'asc')->get()->toArray();
        $pays           = Pays::select()->orderBy('nom_fr', 'asc')->get()->toArray();


        $personne = Personne::leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
            ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
            ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
            ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
            ->select(
                'personnes.id as id',
                'personnes.nom as nom_p',
                'personnes.prenom as prenom_p',
                'pp.nom_fr as nationalite_p',
                'personnes.adresse as adresse_p',
                'personnes.telephone_fixe as fixe_p',
                'personnes.mobile as mobile_p',
                'structures.nom as nom_s',
                'structures.siege as siege',
                'structures.capital as capital',
                'structures.typestructure_id as typepersonne_id',
                'ps.nom_fr as nationalite_s',
                'entreprises.raison_social as raison_social',
                'entreprises.registre_commerce as registre_commerce',
                'entreprises.nombre_actionnaires as nombre_actionnaires',
                'entreprises.ice as ice',
                'entreprises.cnss as cnss',
                'entreprises.if as if',
                'users.email as email'
            )
            ->where('personnes.id', $personne1->id)
            ->get()
            ->first();

        //dd($personne);

        $modif = $this->timepass($personne->id) !== null && $this->timepass($personne->id)  <= 4 ? false : true;

        //dd($personne);
        #return redirect()->back();
        return redirect()->route('profil.index');
    }

    public function timepass($iddemandeur)
    {
        $datenow     = new \DateTime();
        $datenow     = $datenow->format('Y-m-d H:i:s');
        $lastdemande = \DB::table('demandes')->where('personne_id', $iddemandeur)->latest('id')->first();

        $months = null;
        $minutes = null;
        if (isset($lastdemande)) {
            $diff = strtotime($datenow) - strtotime($lastdemande->created_at);

            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                / (30 * 60 * 60 * 24));

            // $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
            //     $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            // $hours = floor(($diff - $years * 365 * 60 * 60 * 24
            //     - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
            //     / (60 * 60));
            // $minutes = floor(($diff - $years * 365 * 60 * 60 * 24
            //     - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
            //     - $hours * 60 * 60) / 60);
            // $seconds = floor(($diff - $years * 365 * 60 * 60 * 24
            //     - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
            //     - $hours * 60 * 60 - $minutes * 60));
        }

        return $months;
    }
}
