<ul class="list-group">
    <li class="list-group-item text-muted"><h3>{{ __('contenu.sidemenu.PROFIL') }}</h3></li>
    <li class="list-group-item"><a class="btn btn-primary compte" href="{{ route('profil.index') }}"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('contenu.sidemenu.COMPTE') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a></li>
    <li class="list-group-item"><a class="btn btn-primary historique" href="{{ route('demande.index') }}"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('contenu.sidemenu.DEMANDES') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a></li>
    <li class="list-group-item"><button id="creerdemande" class="btn btn-primary creerdemande" ><strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ __('contenu.sidemenu.CREATEDEM') }}</strong></button></li>

</ul>