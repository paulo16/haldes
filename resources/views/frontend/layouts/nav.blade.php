<nav class="navbar navbar-pasific navbar-mp navbar-standart megamenu navbar-fixed-top top-nav-collapse"
    style="border-bottom:1px solid #fff;">
    <div class="pull-left">
        <a class="navbar-brand page-scroll" href="{{route('accueil')}}">
            <img src="{{asset('assets/frontend/img/logo/logo_ministere.png')}}" style="width:170px;height:55px"
                alt="logo">
            <span>Autorisations d'exploitation des haldes et terrils</span>
        </a>
    </div>

    <div class="navbar-collapse collapse navbar-main-collapse">
        <ul class="nav navbar-nav">
            @if (Route::has('login'))
            <li><a href="{{route('accueil')}}" class=" color-light">@lang('contenu.nav.accueil') </a>
            </li>

            @auth
            <li>
                <a href="{{ route ('profil.index') }}">@lang('contenu.nav.suivi')</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('contenu.nav.DECONNEXION') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            @else
            <li>
                <a href="{{ route('login') }}"> {{ __('contenu.nav.CONNEXION') }}</a>
            </li>
            @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('contenu.nav.INSCRIRE') }}</a>
            </li>
            @endif
            @endauth

            @endif
            @role('admin')
            <li>
                <a href="{{ route ('ADMIN') }}"> {{ __('contenu.nav.ADMIN') }}</a>
            </li>
            @endrole
            <li>
                <a href="{{ route ('contact.index') }}">{{ __('contenu.nav.CONTACT') }}</a>
            </li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button"
                        data-toggle="dropdown">{{ __('contenu.nav.lang') }}
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  href="lang/fr">{{ __('contenu.nav.fr') }}</a></li>
                        <li><a  href="lang/ar">{{ __('contenu.nav.ar') }}</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

</nav>