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
        </ul>
    </div>
</nav>
