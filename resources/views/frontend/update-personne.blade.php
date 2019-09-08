@extends('frontend.layouts.default')
@section('head')
<title>
    Haldes | modifier profil
</title>
@endsection
@section('header')
<header class="bg-grad-blue mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp"
                    data-animation-delay="100">
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
                           MODIFIER MON PROFIL
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
                    <h3>
                        MODIFIER VOTRE PROFIL
                    </h3>

                    <form action="{{ route('profil.update',$personne) }}" class="wizard clearfix" method="POST"
                        name="enregistrement">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">
                                    <b>
                                        INFORMATIONS SUR LE REPRESENTANT / COOPERATIVE
                                    </b>
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            NOM
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="nom_responsable"
                                            placeholder="" type="text"
                                            value="{{ old('nom_responsable',$personne->nom_p) }}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            PRENOM
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="prenom" placeholder=""
                                            type="text" value="{{ old('prenom',$personne->prenom_p)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            EMAIL
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="email" placeholder=""
                                            type="email" value="{{ old('email',$personne->email)}}">
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
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            NATIONALITE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <select class="form-control" id="nationalite_responsable"
                                            name="nationalite_responsable" value="{{ old('nationalite_responsable')}}">
                                            @foreach ($pays as $p)
                                            @if (isset($personne->nationalite_p))
                                            @if ($p['nom_fr'] == $personne->nationalite_p)
                                            <option value="{{$p['id']}}" selected>
                                                {{$p['nom_fr']}}
                                            </option>
                                            @endif
                                            @else
                                            @if ($p['nom_fr'] == "Maroc")
                                            <option value="{{$p['id']}}" selected>
                                                {{$p['nom_fr']}}
                                            </option>
                                            @endif
                                            @endif
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            TELEPHONE FIXE
                                        </label>
                                        <input class="input-md input-circle form-control" name="fixe" placeholder=""
                                            type="text" value="{{ old('fixe',$personne->fixe_p)}}">
                                        </input>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            MOBILE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="mobile" placeholder=""
                                            type="text" value="{{ old('mobile',$personne->mobile_p)}}">
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
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            ADRESSE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="adresse_responsable"
                                            placeholder="" type="text"
                                            value="{{ old('adresse_responsable',$personne->adresse_p)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            TITRE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <select class="form-control" id="type_structure" name="type_personne">
                                            @foreach ($typepersonnes as $tp)
                                            @if ($tp['id'] == $personne->typepersonne_id)
                                            <option value="{{$tp['id']}}" selected>
                                                {{$tp['nom']}}
                                            </option>
                                            @endif
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            CIN / PASSEPORT
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="cin" placeholder=""
                                            type="text" value="{{ old('cin',$personne->cin)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            TYPE DE STRUCTURE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <select class="form-control" id="type_structure" name="type_structure">
                                            @foreach ($typestructures as $ts)
                                            @if ($ts['id'] == $personne->typestructure_id)
                                            <option value="{{$ts['id']}}" selected>
                                                {{$ts['nom']}}
                                            </option>
                                            @endif
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            RAISON SOCIAL
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="raison_social"
                                            placeholder="" type="text"
                                            value="{{ old('raison_social',$personne->raison_social)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            SIEGE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="siege_entreprise"
                                            placeholder="" type="text"
                                            value="{{ old('siege_entreprise',$personne->siege)}}">
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
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            CAPITAL (MONTANT DH)
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="capital_entreprise"
                                            placeholder="" type="number"
                                            value="{{ old('capital_entreprise',$personne->capital)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            REGISTRE COMMERCE/LOCAL
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="registre_commerce"
                                            placeholder="" type="text"
                                            value="{{ old('registre_commerce',$personne->registre_commerce)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            ICE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="ice" placeholder=""
                                            type="text" value="{{ old('ice',$personne->ice)}}">
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
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            FIXE
                                        </label>
                                        <input class="input-md input-circle form-control" name="fixe_entreprise"
                                            placeholder="" type="text"
                                            value="{{ old('fixe_entreprise',$personne->fixe_p)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            FAX
                                        </label>
                                        <input class="input-md input-circle form-control" name="fax_entreprise"
                                            placeholder="" type="text"
                                            value="{{ old('fax_entreprise',$personne->fax_strucure)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            DATE CREATION ENTREPRISE
                                        </label>
                                        <input class="input-md input-circle form-control" name="date_creation"
                                            placeholder="" type="date"
                                            value="{{ old('date_creation',$personne->date_creation)}}">
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
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            NOM GERANT
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="nom_gerant"
                                            placeholder="" type="text"
                                            value="{{ old('nom_gerant',$personne->nom_gerant)}}">
                                        @error('nom_gerant')
                                        <span class="color-red">
                                            <code>
                                        {{ $message }}
                                        </code>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            PRENOM GERANT
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="prenom_gerant"
                                            placeholder="" type="text"
                                            value="{{ old('prenom_gerant',$personne->prenom_gerant)}}">
                                        @error('prenom_gerant')
                                        <span class="color-red">
                                            <code>
                                            {{ $message }}
                                            </code>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            EMAIL GERANT
                                            <span class="color-red">

                                            </span>
                                        </label>

                                        <input class="input-md input-circle form-control" name="email_gerant"
                                            placeholder="" type="email"
                                            value="{{ old('email_gerant',$personne->email_gerant)}}">
                                        @error('email_gerant')
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
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            IF
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="identifiant_fiscal"
                                            placeholder="" type="text"
                                            value="{{ old('identifiant_fiscal',$personne->if)}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            TELEPHONE GERANT
                                            <span class="color-red">

                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="tel_gerant"
                                            placeholder="" type="tel_gerant"
                                            value="{{ old('tel_gerant',$personne->tel_gerant)}}">
                                        @error('tel_gerant')
                                        <span class="color-red">
                                            <code>
                                                {{ $message }}
                                    </code>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            ADRESSE GERANT
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="adresse_gerant"
                                            placeholder="" type="adresse_gerant"
                                            value="{{ old('adresse_gerant',$personne->adresse_gerant)}}">
                                        @error('adresse_gerant')
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            NATIONALITE ENTREPRISE
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <select class="form-control" id="nationalite_entreprise"
                                            name="nationalite_entreprise" value="{{ old('nationalite_entreprise')}}">
                                            @foreach ($pays as $p)

                                            @if (isset($personne->nationalite_id))
                                            @if ($p['id'] == $personne->nationalite_id)
                                            <option value="{{$p['id']}}" selected>
                                                {{$p['nom_fr']}}
                                            </option>
                                            @endif
                                            @else
                                            @if ($p['nom_fr'] == "Maroc")
                                            <option value="{{$p['id']}}" selected>
                                                {{$p['nom_fr']}}
                                            </option>
                                            @endif
                                            <option value="{{$p['id']}}">
                                                {{$p['nom_fr']}}
                                            </option>
                                            @endif
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            CNSS
                                            <span class="color-red">
                                                *
                                            </span>
                                        </label>
                                        <input class="input-md input-circle form-control" name="cnss" placeholder=""
                                            type="text" value="{{ old('cnss',$personne->cnss)}}">
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
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="col-md-12 col-xs-12 text-center pb10">
                                <button class="button button-lg button-circle button-info" type="submit">
                                    MODIFIER PROFIL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop