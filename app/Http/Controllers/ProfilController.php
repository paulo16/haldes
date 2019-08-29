<?php

namespace App\Http\Controllers;

use App\Pays;
use App\Personne;
use App\Typepersonne;
use App\Typestructure;
use Auth;

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
            ->select('personnes.nom as nom_p', 'personnes.prenom as prenom_p', 'pp.nom_fr as nationalite_p', 'personnes.adresse as adresse_p', 'personnes.telephone_fixe as fixe_p', 'personnes.mobile as mobile_p', 'structures.nom as nom_s', 'structures.siege as siege', 'structures.capital as capital', 'typestructures.nom as type_s', 'ps.nom_fr as nationalite_s',
                'entreprises.raison_social as raison_social', 'entreprises.registre_commerce as registre_commerce', 'entreprises.nombre_actionnaires as nombre_actionnaires', 'entreprises.ice as ice', 'entreprises.cnss as cnss', 'entreprises.if as if', 'users.email as email'
            )
            ->where('personnes.user_id', $currentuser->id)
            ->get()
            ->first();

        //dd($personne);

        return view('frontend.profil', compact('personne', 'typestructures', 'typepersonnes', 'pays'));
    }
}
