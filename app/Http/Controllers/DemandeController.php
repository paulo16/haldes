<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Halde;
use App\Personne;
use App\Piece;
use App\Services\DemandeService;
use App\Services\HaldeService;
use App\Typedemande;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use PDFuseArab;

class DemandeController extends Controller
{

    public function __construct(HaldeService $haldeService, DemandeService $demandeService)
    {

        $this->haldeService   = $haldeService;
        $this->demandeService = $demandeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.demande-list');
    }

    public function datademandes(Request $request)
    {
        return $this->demandeService->listdemandes($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $typedemandes = Typedemande::select()->orderBy('nom', 'asc')->get()->toArray();
        return view('frontend.add-demande', compact('typedemandes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $currentuser = Auth::user();

            $datenow      = new \DateTime();
            $datenow      = $datenow->format('Y-m-d H:i:s');
            $date_day     = date('d', strtotime($datenow));
            $date_month   = date('m', strtotime($datenow));
            $date_year    = date('Y', strtotime($datenow));
            $date_heure   = date('H', strtotime($datenow));
            $date_minute  = date('i', strtotime($datenow));
            $date_seconde = date('s', strtotime($datenow));

            $personne = Personne::leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->select('personnes.id', 'nom', 'email', 'user_id')
                ->where('personnes.user_id', $currentuser->id)
                ->get()
                ->first();
            $email_nom = explode('@', $personne->email);

            $identifiant = $date_day . $date_month . $date_year . $email_nom[0] . $date_heure . $date_minute . $date_seconde;

            $piece = Piece::create([
                'piece1_diplomes_references' => 0,
                'piece2_moyens_humain_technique' => 0,
                'piece3_capacites_techniques_financires' => 0,
                'piece4_troisderniers_bilans_comptes' => 0,
                'piece5_listemateriels_detenu_ou_acquerir' => 0,
                'piece6_garanties_cautions' => 0,
                'piece7_fiche_descrip_entreprise_plus_representant' => 0,
                'piece8_pieces_administratives_obligations_cotisations' => 0,
                'piece9_qualite_mandataire' => 0,
                'piece10_plan_trois_exemplaire' => 0,
                'piece11_recepisse_versement_service_mine' => 0,
                'piece12_engagement_etude_environnement' => 0,

            ]);

            $halde = Halde::where('id', $request->get('halde'))->get()->first();
            $halde->disponible = 0;
            $halde->save();

            $demande = Demande::create([
                'nom'            => $identifiant,
                'halde_id'       => $request->get('halde'),
                'typedemande_id' => $request->get('typedemande'),
                'personne_id'    => $personne->id,
                'piece_id'    => $piece->id,
                'etat'           => 'reservation électronique',
            ]);
            DB::commit();
            //all good
        } catch (\Exception $e) {
            DB::rollback();
            //something went wrong
        }
        return $demande;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
            ->leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
            ->leftJoin('haldes', 'haldes.id', '=', 'demandes.halde_id')
            ->leftJoin('regions', 'regions.id', '=', 'haldes.region_id')
            ->leftJoin('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
            ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
            ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
            ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
            ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
            ->select(
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
                'users.email as email',
                'haldes.nom as nom_halde',
                'haldes.coordonnees as coordonnees',
                'haldes.qte_dechets as qte_dechets',
                'regions.nom as region',
                'province_prefecture.nom as province',
                'demandes.created_at as date_creation',
                'demandes.nom as identifiant',
                'demandes.id as id_demande'
            )
            ->where('demandes.id', $id)
            ->first();

        return view('frontend.resume', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datahaldesfrontend(Request $request)
    {
        return $this->haldeService->listhaldesfrontend($request);
    }

    public function pdfpieces($id)
    {
        $data = compact([""]);

        view()->share('data', $data);

        // pass view file
        $pdf = PDFuseArab::loadView('frontend.pdfpieces');
        // download pdf
        return $pdf->download('pieces-a-fournir.pdf');
    }

    public function pdfengagement($id)
    {
        $demande = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
            ->leftJoin('structures', 'personnes.structure_id', '=', 'structures.id')
            ->leftJoin('haldes', 'haldes.id', '=', 'demandes.halde_id')
            ->leftJoin('regions', 'regions.id', '=', 'haldes.region_id')
            ->leftJoin('province_prefecture', 'province_prefecture.id', '=', 'haldes.province_id')
            ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->leftJoin('entreprises', 'entreprises.structure_id', '=', 'structures.id')
            ->leftJoin('pays as pp', 'personnes.nationalite', '=', 'pp.id')
            ->leftJoin('pays as ps', 'structures.nationalite', '=', 'ps.id')
            ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.typestructure_id')
            ->select(
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
                'users.email as email',
                'haldes.nom as nom_halde',
                'haldes.coordonnees as coordonnees',
                'haldes.qte_dechets as qte_dechets',
                'regions.nom as region',
                'province_prefecture.nom as province',
                'demandes.created_at as date_creation',
                'demandes.nom as identifiant',
                'demandes.id as id_demande',
                'personnes.cin as cin'
            )
            ->where('demandes.id', $id)
            ->first();
        $date_creation = date('d/m/Y', strtotime($demande->date_creation));
        $data          = compact(["demande", "date_creation"]);

        view()->share('data', $data);
        // pass view file
        $pdf = PDF::loadView('frontend.pdfengagement');
        // download pdf
        return $pdf->download($demande->identifiant . '-engagement.pdf');
    }

    public function lastdemande()
    {
        $currentuser = Auth::user();
        $personne = Personne::leftJoin('users', 'users.id', '=', 'personnes.user_id')
            ->select('personnes.id', 'user_id')
            ->where('personnes.user_id', $currentuser->id)
            ->get()
            ->first();
        $tempspasser = $this->demandeService->timepass($personne->id);

        if (isset($tempspasser) &&  $tempspasser < 4) {
            $reponse = ["reponse" => "impossible"];
            return response()->json($reponse);
        } else {
            $reponse = ["reponse" => "ok"];
            return response()->json($reponse);
        }
    }
}
