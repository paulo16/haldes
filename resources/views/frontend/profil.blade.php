@extends('frontend.layouts.default')
@section('head')
<title>Haldes | Profil</title>
@endsection
@section('header')
<header class="bg-grad-blue  mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp"
                    data-animation-delay="100">SUIVI DES DEMANDES<small class="color-light alpha7">Explorez les
                        onglets</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <div class="col-sm-8">
                    <ul class="breadcrumb">
                        <li>
                            <H3 class="color-light text-uppercase animated fadeInUp visible">MON COMPTE</a></H3>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <img title="profile image" class="img-circle img-responsive"
                        src="{{ asset('assets/frontend/img/avatar/user.png') }}">
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<div>
    <div class="container-fluid">
    </div>
    <div id="compte" class="pt20 pb50">
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-3">
                    <!--left col-->
                    @include('frontend.layouts.sidemenu')
                </div>
                <!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home" data-toggle="tab">INFORMATIONS GENERALES</a></li>
                        <li><a href="#messages" data-toggle="tab">INFORMATIONS SUR L'ENTREPRISE</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            @if (isset($modif))
                            <div class="text-right">
                                <a class="btn btn-primary modifprofil"
                                    href="{{ route('profil.edit',$personne->id) }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('contenu.profil.modifier') }}
                                </a>
                            </div>
                            @endif

                            <h2>RESPONSABLE / REPRESENTANT
                            </h2>
                            <br>
                            <div class="col-md-6">
                                <div class="col-sm-5 col-xs-6 "><b>NOM:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->nom_p }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6 "><b>PRENOM:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->prenom_p }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>EMAIL:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ Auth::user()->email }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>NATIONALITE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->nationalite_p }}</div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-5 col-xs-6 "><b>TELEPHONE FIXE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->fixe_p }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6 "><b>MOBILE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->mobile_p }}</div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                        </div>
                        <!--/tab-pane-->
                        <div class="tab-pane" id="messages">
                            <h2>ENTREPRISE/COOPERATIVE</h2>
                            <br>
                            <div class="col-md-6">
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6 "><b>NOM:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->nom_s }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>SIEGE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->siege }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>NATIONALITE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->nationalite_s }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="col-sm-5 col-xs-6 "><b>CAPITAL:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->capital }} DH</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6 "><b>TYPE STRUCTURE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->type_s }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>RAISON SOCIAL:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->raison_social}}</div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-7 col-xs-6 "><b>ACTIONNAIRES /MEMBRES:</b></div>
                                <div class="col-sm-5 col-xs-6 ">{{ $personne->nombre_actionnaires }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-6 col-xs-6"><b>REGISTRE COMMERCE:</b></div>
                                <div class="col-sm-6 col-xs-6 ">{{ $personne->registre_commerce  }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6 "><b>ICE:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->ice }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>CNSS:</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->cnss }}</div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- another element-->
                                <div class="col-sm-5 col-xs-6"><b>IF :</b></div>
                                <div class="col-sm-7 col-xs-6 ">{{ $personne->if }}</div>
                                <div class="clearfix"></div>

                                <hr>
                            </div>
                        </div>
                    </div>
                    <!--/tab-pane-->
                </div>
                <!--/tab-content-->
            </div>
            <!--/col-9-->
        </div>
        <!--/row-->
    </div>
    @stop