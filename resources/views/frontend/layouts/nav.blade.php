<nav class="navbar navbar-pasific navbar-mp navbar-standart megamenu navbar-fixed-top top-nav-collapse" style="border-bottom:1px solid #fff;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="{{route('accueil')}}">
                <img src="{{asset('assets/frontend/img/logo/logo_ministere.png')}}" style="width: 155px;height:50px" alt="logo">
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                @if (Route::has('login'))
                <li><a href="{{route('accueil')}}" class=" color-light">Accuiel </a>
            </li>
            
            @auth
            <li>
                <a href="{{ route ('profil.index') }}">SUIVI</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('DECONNEXION') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            
            @else
            <li>
                <a href="{{ route('login') }}">CONNEXION</a>
            </li>
            @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">S'INSCRIRE</a>
            </li>
            @endif
            @endauth
            
            @endif
            <li>
              <a href="{{ route ('ADMIN') }}">ADMIN</a>
            </li>
            <li>
                <a href="{{ route ('contact.index') }}">CONTACTEZ NOUS</a>
            </li>
            <li>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Langues
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="lang/fr">Français</a></li>
                        <li><a class="dropdown-item" href="lang/ar">Arabe</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
</nav>