@extends('frontend.layouts.default')
@section('head')
<title>
    Haldes | Login
</title>
@endsection
@section('header')
<header class="bg-grad-blue mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                    CONNEXION
                    <small class="color-light alpha7">
                        INSCRIPTION
                    </small>
                </h3>
            </div>
            <div class="col-md-6 text-right pt25">
                <a class="button button-md button-blue hover-ripple-out pull-right">
                    S'INSCRIRE
                </a>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<!-- Form Styles
    ===================================== -->
<div class="container-fluid bg-dark pb70 pt70 " style="background: url(assets/frontend/img/bg/beach-stones.jpg) 50% 50% no-repeat;">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-5 col-sm-8 col-xs-12 col-md-offset-4 text-center">
                <div class="contact contact-us-one">
                    <div class="col-sm-12 col-xs-12 text-center mb20">
                        <h4 class="pb25 bb-solid-1 text-uppercase">
                            CONNEXION
                            <small class="text-lowercase">
                                veuillez renseigner vos identifant .
                            </small>
                        </h4>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>
                                    EMAIL
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
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

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="checkbox">
                              <label>
                                    <input 
                                    type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    
                                        {{ __('Se Rappeler de moi') }}
                                    </label>
                                </div>
                    
                        </div>
                        <div class="col-sm-12 mt10 text-center mb20">
                                            <button type="submit" class="button-3d button-md button-block button-blue hover-ripple-out">Login</button>
                                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
