<ul class="list-group">
    <li class="list-group-item text-muted"><h3>{{ __('contenu.sidemenu.PROFIL') }}</h3></li>
    <li class="list-group-item"><a href="{{ route('profil.index') }}"><strong>{{ __('contenu.sidemenu.COMPTE') }}</strong></a></li>
    <li class="list-group-item"><a href="{{ route('demande.index') }}"><strong>{{ __('contenu.sidemenu.DEMANDES') }}</strong></a></li>
    <li class="list-group-item"><a href="{{ route('demande.create') }}"><strong>{{ __('contenu.sidemenu.CREATEDEM') }}</strong></a></li>

</ul>