@extends('frontend.layouts.default')
@section('head')
<title>
Haldes | Resumé
</title>
@endsection
@section('header')
<header class="bg-grad-blue mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                SUIVI DES DEMANDES
                <small class="color-light alpha7">
                Explorez les onglets
                </small>
                </h3>
            </div>
            <div class="col-md-6 text-right pt35">
                <ul class="breadcrumb">
                    <li>
                        <h3 class="color-light text-uppercase animated fadeInUp visible">
                        RÉSUMÉ DE LA DEMANDE
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
</div>
@endsection
@section('content')
<div>
<div class="container-fluid">
</div>
<div class="pt20 pb50" id="compte">
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                @include('frontend.layouts.sidemenu')
            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <h3 >
                RÉSUMÉ DE VOTRE DEMANDE
                </h3>
                  <hr><br>
                <div class="col-sm-12 text-right pt25">
                    <a  target="_blank" href="{{ route('engagement-pdf',['id' => $demande->id_demande])}}" class="button button-md button-blue hover-ripple-out pull-left">
                        Telecharger la lettre d'engagement
                    </a>
                    <a class="button button-md button-blue hover-ripple-out pull-right" target="_blank" href="{{ route('pieces-pdf',['id' => $demande->id_demande]) }}" >
                        Telecharger liste des pièces
                    </a>
                </div>
                <hr><br>
                <div class="row pt30">
                    <div class="text-center pb20">
                        <h4>RESPONSABLE / REPRESENTANT</h4>
                    </div>
                    <br/>
                    <div class="col-md-6">
                        <div class="col-sm-5 col-xs-6 "><b>NOM:</b></div>
                        <div class="col-sm-7 col-xs-6 ">{{ $demande->nom_p }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6 "><b>PRENOM:</b></div>
                        <div class="col-sm-7 col-xs-6 ">{{ $demande->prenom_p }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                    </div>
                    <div class="col-md-6">
                        <div class="col-sm-5 col-xs-6 "><b>NOM:</b></div>
                        <div class="col-sm-5 col-xs-6">{{ $demande->nom_s }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>RAISON SOCIAL:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->raison_social}}</div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
                <div class="row pt30">
                    <div class="text-center pb20">
                        <h4>
                        INFORMATIONS SUR  LE TERRIL DEMANDÉ
                        </h4>
                    </div>
                    <!-- another element-->
                    <div class="col-md-6">
                        <div class="col-sm-5 col-xs-6 "><b>NOM:</b></div>
                        <div class="col-sm-5 col-xs-6">{{ $demande->nom_halde }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>COORDONNEES:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->coordonnees}}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>QTE DECHETS:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->qte_dechets }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>DATE DEMANDE:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->date_creation }}</div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>REGION:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->region }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>PROVINCE:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->province }}</div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- another element-->
                        <div class="col-sm-5 col-xs-6"><b>DEMANDE INDENTIFIANT:</b></div>
                        <div class="col-sm-5 col-xs-6 ">{{ $demande->identifiant }}</div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/col-9-->
        </div>
        <!--/row-->
    </div>
    @stop
</div>