
@extends('frontend.layouts.default')

@section('head')
<title>Haldes | Accueil</title>
@endsection

@section('header')
<header class="bg-grad-stellar mt70">
    <div class="container">
    </div>
</header>
@endsection

@section('content')
<div>
<div class="container-fluid">
</div>
<div class="row pt70 pb40" style="background: url('assets/frontend/img/bg/at-ground.jpg') 50% 50% no-repeat;">
    <div class="col-md-12 text-center">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-warning">
                                    <i class="fa fa-life-buoy color-light"></i>
                                </small>
                                Enregistez-vous sur la plateforme
                                <small class="heading-desc text-capitalize color-light alpha10">
                                    verifier vos emails pour l'activation du compte.
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-danger">
                                    <i class="fa fa-apple color-light"></i>
                                </small>
                                Connectez-Vous
                                <small class="heading-desc text-capitalize color-light alpha10">
                                    Pour explorer votre profil.
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-gray2">
                                    <i class="fa fa-android color-dark"></i>
                                </small>
                                Faites vos demandes
                                <small class="heading-desc text-capitalize color-light alpha10">
                                    Utiliser la plateforme pour faire vos demandes de permis d'exploitation de site (haldes ou terrils) .
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-light">
                                    <i class="fa fa-heart color-dark"></i>
                                </small>
                                Suivez vos demandes 
                                <small class="heading-desc text-capitalize color-light alpha10">
                                   Controler en temps reél l'état de vos demandes.
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route('register')}}" class="button button-lg button-rounded button-success">ENREGISTREZ-VOUS</a>
                            <a  href="{{route('profil.index')}}" class="button button-lg button-rounded  button-info">SUIVEZ VOS DEMANDES</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop