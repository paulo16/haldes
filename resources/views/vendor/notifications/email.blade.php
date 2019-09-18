@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Bonjour!')
@endif
@endif

{{-- Intro Lines --}}
@if (Route::has('password.request'))
Veuillez cliquer sur le bouton ci-dessous pour réinitialiser votre mot de passe .
@else
Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.
@endif
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
@if (Route::has('password.request'))

réinitialiser mot de passe
@php
$button= "réinitialiser mot de passe";

@endphp
@else
Vérification adresse email
@php
$button= "Verification adresse email";

@endphp
@endif
@endcomponent
@endisset

{{-- Outro Lines --}}

Si vous n'avez pas créé de compte, aucune action supplémentaire n'est requise.

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Cordialement'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"Si vous ne parvenez pas à cliquer sur le bouton \"$button\" , copiez et collez l'URL ci-dessous \n".
'Dans votre navigateur: [:actionURL](:actionURL)',
[
'actionText' => $actionText,
'actionURL' => $actionUrl,
]
)
@endslot
@endisset
@endcomponent