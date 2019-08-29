@extends('frontend.layouts.default')
@section('head')
<title>
Haldes | Register
</title>
@endsection
@section('header')
<header class="bg-grad-blue mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                ENREGISTREMENT
                <small class="color-light alpha7">
                CONNEXION
                </small>
                </h3>
            </div>
            <div class="col-md-6 text-right pt25">
                <a class="button button-md button-blue hover-ripple-out pull-right">
                    CONNEXION
                </a>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<!-- Form Styles
===================================== -->
<section id="registerForm">
    <div class="container-fluid bg-dark pb70 pt70" style="background: url(assets/frontend/img/bg/beach-stones.jpg) 50% 50% no-repeat;">
        <div class="container">
            <form action="{{ route('register') }}" class="wizard clearfix" method="POST" name="enregistrement">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">
                        <b>
                        INFORMATIONS SUR LE REPRESENTANT
                        </b>
                        </h4>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    NOM
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="nom_responsable" placeholder="" type="text" value="{{ old('nom_responsable') }}">
                                @error('nom_responsable')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    PRENOM
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="prenom" placeholder="" type="text" value="{{ old('prenom')}}">
                                @error('prenom')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    EMIAL
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="email" placeholder="" type="email" value="{{ old('email')}}">
                                @error('email')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    NATIONALITE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <select class="form-control" id="nationalite_responsable" name="nationalite_responsable" value="{{ old('nationalite_responsable')}}">
                                    @foreach ($pays as $p)
                                    <option value="{{$p['id']}}">
                                        {{$p['nom_fr']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('nationalite_responsable')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    TELEPHONE FIXE
                                </label>
                                <input class="input-md input-circle form-control" name="fixe" placeholder="" type="text" value="{{ old('fixe')}}">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    MOBILE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="mobile" placeholder="" type="text" value="{{ old('mobile')}}">
                                @error('mobile')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    ADRESSE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="adresse_responsable" placeholder="" type="text" value="{{ old('adresse_responsable')}}">
                                @error('adresse_responsable')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    TYPE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <select class="form-control" id="type_structure" name="type_personne" value="{{ old('type_personne')}}">
                                    @foreach ($typepersonnes as $tp)
                                    <option value="{{$tp['id']}}">
                                        {{$tp['nom']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('type_personne')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    CIN
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="cin" placeholder="" type="text">
                                @error('cin')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    MOT DE PASSE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="password" placeholder="" type="password">
                                @error('password')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    CONFIRMER MOT DE PASSE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input autocomplete="new-password" class="input-md input-circle form-control" id="password-confirm" name="password_confirmation" placeholder="" type="password">
                                @error('password_confirm')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--  ########  -->
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center ">
                        <b>
                        INFORMATIONS SUR L' ENTREPRISE / COOPERATIVE
                        </b>
                        </h4>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    NOM
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="nom_entreprise" placeholder="" type="text" value="{{ old('nom_entreprise') }}">
                                @error('nom_entreprise')
                                <span class="color-red" role="alert">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    SIEGE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="siege_entreprise" placeholder="" type="text" value="{{ old('siege_entreprise')}}">
                                @error('siege_entreprise')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    NATIONALITE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <select class="form-control" id="nationalite_entreprise" name="nationalite_entreprise" value="{{ old('nationalite_entreprise')}}">
                                    @foreach ($pays as $p)
                                    <option value="{{$p['id']}}">
                                        {{$p['nom_fr']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('nationalite_entreprise')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    CAPITAL
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="capital_entreprise" placeholder="" type="number" value="{{ old('capital_entreprise')}}">
                                @error('capital_entreprise')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    TYPE DE STRUCTURE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <select class="form-control" id="type_structure" name="type_structure" value="{{ old('type_structure')}}">
                                    @foreach ($typestructures as $ts)
                                    <option value="{{$ts['id']}}">
                                        {{$ts['nom']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('type_structure')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    RAISON SOCIAL
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="raison_social" placeholder="" type="text" value="{{ old('raison_social')}}">
                                @error('raison_social')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    REGISTRE COMMERCE/LOCAL
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="registre_commerce" placeholder="" type="text" value="{{ old('registre_commerce')}}">
                                @error('registre_commerce')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    ACTIONNAIRES / MEMBRES
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="nombre_personne" placeholder="" type="number" value="{{ old('nombre_personne')}}">
                                @error('nombre_personne')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    ICE
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="ice" placeholder="" type="text" value="{{ old('ice')}}">
                                @error('ice')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    CNSS
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="cnss" placeholder="" type="text" value="{{ old('cnss')}}">
                                @error('cnss')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    IF
                                    <span class="color-red">
                                        *
                                    </span>
                                </label>
                                <input class="input-md input-circle form-control" name="identifiant_fiscal" placeholder="" type="text" value="{{ old('identifiant_fiscal')}}">
                                </input>
                            </div>
                            @error('identifiant_fiscal')
                            <span class="color-red">
                                <code>
                                {{ $message }}
                                </code>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    FIXE
                                </label>
                                <input class="input-md input-circle form-control" name="fixe_entreprise" placeholder="" type="text" value="{{ old('fixe_entreprise')}}">
                                @error('fixe_entreprise')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    FAX
                                </label>
                                <input class="input-md input-circle form-control" name="fax_entreprise" placeholder="" type="text" value="{{ old('fax_entreprise')}}">
                                @error('fax_entreprise')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    DATE CREATION
                                </label>
                                <input class="input-md input-circle form-control" name="date_creation" placeholder="" type="date" value="{{ old('date_creation')}}">
                                @error('date_creation')
                                <span class="color-red">
                                    <code>
                                    {{ $message }}
                                    </code>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 col-xs-12 text-center pb10">
                        <button class="button button-lg button-circle button-info" type="submit">
                        S'INSCRIRE
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 col-xs-12 text-center pb10">
                        vous avez déjà un compte ?
                        <a href="{{route('login')}}">
                            se connecter
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@stop