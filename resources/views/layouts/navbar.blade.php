<nav class="navbar navbar-expand-lg justify-content-end fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleMobileMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="toggleMobileMenu">
        <ul class="navbar-nav mr-auto align-items-center nav-transparent">
            <li class="nav-item active"><a class=" nav-link slider" href="{{ route('index') }}">GŁÓWNA</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('menu') }}">MENU</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('gallery') }}">GALERIA</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('booking') }}">REZERWACJE</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('contact') }}">KONTAKT</a></li>
            <li class="nav-item"><a class="nav-link slider" href="game.html">GRA</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"><i class="bi bi-cart"></i></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Zaloguj się</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Zarejestruj się</a>
                    @endguest
                    @auth
                            <div class="dropdown-header">
                                <h3>Witaj {{ Auth::user()->name }}!</h3>
                            </div>
                            <a class="dropdown-item" href="{{ route('history-order', ['filter' => 0, 'sort' => 0]) }}">Zamówienia</a>
                            @if(Auth::user()->role_as == '1')
                                <a class="dropdown-item" href="{{ route('admin-categories-preview') }}">Zarządzaj kategoriami</a>
                                <a class="dropdown-item" href="{{ route('admin-products-preview') }}">Zarządzaj produktami</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a>
                    @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>
