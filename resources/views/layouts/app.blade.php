<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>

    <link href="{{ URL::asset('css/Bootstrap/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{ URL::asset('js/script.js') }}"></script>

    @if (Route::is('gallery') || Route::is('menu') || Route::is('history-order'))
        <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    @endif
</head>
        @if (Route::is('index') || Route::is('home') || Route::is('contact')|| Route::is('gallery') || Route::is('menu'))
            <body>
        @else
            <body class="booking-background">
        @endif

    @yield('content')
<footer class="row justify-content-center align-content-center mp-side-zero">
    <section class="col-xl-2 col-md-4 col-sm-8 bottom-buffer-40">
        <h5>
            Rezerwacja stolika
        </h5>
        <p>
            <a href="mailto:email@gmail.com" class="link">email@gmail.com</a> <br>
            <a href="tel:+48123456789" class="link">+48 123 456 789</a>
        </p>
    </section>
    <section class="col-xl-2 col-md-4 col-sm-8 bottom-buffer-40">
        <h5>
            Przydatne informacje
        </h5>
        <a href="{{ route('menu') }}" class="link">Menu</a><br>
        <a href="{{ route('gallery') }}" class="link">Galeria</a><br>
        <a href="{{ route('booking-create') }}" class="link">Rezerwacje</a><br>
        <a href="{{ route('contact') }}" class="link">Kontakt</a><br>
    </section>
    <section class="col-xl-2 col-md-4 col-sm-8 bottom-buffer-40">
        <h5>
            Adres
        </h5>
        <p>
            STREET FOOD<br>
            ul. Grodzka 724<br>
            20-400 Lublin
        </p>
    </section>
    <section class="col-xl-2 col-md-4 col-sm-8 bottom-buffer-40">
        <h5>
            Czynne codziennie:
        </h5>
        <table>
            <tr>
                <th>niedz.-pon.:</th>
                <th>14:00-23:00</th>
            </tr>
            <tr>
                <th>wt.-czw.:</th>
                <th>14:00-00:00</th>
            </tr>
            <tr>
                <th>pt.-sob.:</th>
                <th>12:00-02:00</th>
            </tr>
        </table>
    </section>
</footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
