@extends('frontend.layouts.default')
@section('head')
<title>
    Haldes | Verification
</title>
@endsection
@section('header')
<header class="bg-grad-blue mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                   VERIFICATION EMAIL
                    <small class="color-light alpha7">
                        CONSULTEZ VOTRE COMPTE
                    </small>
                </h3>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<div class="container-fluid bg-dark pb70 pt70 " style="background: url(assets/frontend/img/bg/beach-stones.jpg) 50% 50% no-repeat;">
        <div class="col-md-12">
            <div class="container-fluid bg-gray pt40 pb40 bb-dashed-1">
                <h3>{{ __('Vérifiez votre adresse email ') }}</h3>

                <p>
                    <h4>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __(' Un lien vous a été envoyez sur l\'adresse email mentionée lors de l\'inscription.') }}
                        </div>
                    @endif
                </h4>
                </p>

                <p> <h4>

                    {{ __('Avant de continuer , vueillez consulter votre adresse email.') }}
                </h4>
                </p>
                <p>
                    <h4>
                    {{ __('Si vous n\'avez pas reçu de lien d\'activation ') }}, <a href="{{ route('verification.resend') }}" class="color-red">{{ __('cliquez ici pour recevoir un autre lien') }}</a>.
                </h4>
                </p>
            </div>
        </div>
</div>
@stop
