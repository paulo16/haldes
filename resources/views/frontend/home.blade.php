@extends('frontend.layouts.default')

@section('head')
<title>@lang('contenu.home.titre_header')</title>
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
                                @lang('contenu.home.enregistrer_vous')
                                <small class="heading-desc text-capitalize color-light alpha10">
                                    @lang('contenu.home.verif_email')
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-danger">
                                    <i class="fa fa-apple color-light"></i>
                                </small>
                                 @lang('contenu.home.connectez_vous')
                                <small class="heading-desc text-capitalize color-light alpha10">
                                    @lang('contenu.home.explorez')                
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-gray2">
                                    <i class="fa fa-android color-dark"></i>
                                </small>
                                @lang('contenu.home.msg_faitedemande') 
                                
                                <small class="heading-desc text-capitalize color-light alpha10">
                                    
                                    @lang('contenu.home.msg_utliserhalde') 
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 mb40">
                            <h4 class="text-center text-uppercase color-light">
                                <small class="heading heading-icon heading-icon-circle center-block bg-light">
                                    <i class="fa fa-heart color-dark"></i>
                                </small>
                                @lang('contenu.home.msg_suivez') 

                                <small class="heading-desc text-capitalize color-light alpha10">
                                    @lang('contenu.home.msg_controler') 
                                   
                                </small>
                            </h4>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{route('register')}}"
                                class="button button-lg button-rounded button-success"> @lang('contenu.home.msg_enreg')</a>
                            <a href="{{route('profil.index')}}"
                                class="button button-lg button-rounded  button-info">@lang('contenu.home.msg_suivdem')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop