<nav class="nav-main navbar navbar-expand-lg justify-content-end fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleMobileMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="toggleMobileMenu">
        <ul class="navbar-nav mr-auto align-items-center nav-transparent">
            <li class="nav-item active"><a class=" nav-link slider" href="{{ route('index') }}">GŁÓWNA</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('menu') }}">MENU</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('gallery') }}">GALERIA</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('booking-create') }}">REZERWACJE</a></li>
            <li class="nav-item"><a class="nav-link slider" href="{{ route('contact') }}">KONTAKT</a></li>
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
                            <a class="dropdown-item" href="{{ route('history-order', ['filter' => '0', 'sort' => 'ordered_at', 'direction' => 'desc']) }}">Zamówienia</a>
                            <a class="dropdown-item" href="{{ route('booking-history', ['filter' => '0', 'sort' => 'booking_on_date', 'direction' => 'desc']) }}">Rezerwacje</a>
                            <a class="dropdown-item" href="{{ route('account') }}">Ustawienia konta</a>
                            @if(Auth::user()->role_as == '1')
                                <a class="dropdown-item" href="{{ route('admin-categories-preview') }}">Zarządzaj kategoriami</a>
                                <a class="dropdown-item" href="{{ route('admin-products-preview') }}">Zarządzaj produktami</a>
                                <a class="dropdown-item" href="{{ route('preview-admin-booking') }}">Zarządzaj rezerwacjami</a>
                                <a class="dropdown-item" href="{{ route('preview-user') }}">Zarządzaj kontami</a>
                                <a class="dropdown-item" href="{{ route('order-preview') }}">Zarządzaj zamówieniami</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a>
                    @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>
