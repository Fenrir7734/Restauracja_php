@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')
    <main class="container-fluid mp-side-zero" style="margin-top: 10vh">
        <article>
            <header>
                <div class="row justify-content-center top-buffer text-center">
                    <div class="col-8">
                        <h2 class="main-header">KONTAKT</h2>
                    </div>
                </div>
            </header>
            <div class="row justify-content-center top-buffer contact-section">
                <section class="col-lg-4 col-md-8 col-sm-10 bottom-buffer-40">
                    <header>
                        <h3>ZNAJDŹ NAS</h3>
                    </header>
                    <p>
                        STREET FOOD<br>
                        ul. Grodzka 724<br>
                        20-400 Lublin<br>
                        <br>
                        <a href="tel:+48123456789" class="link">+48 123 456 789</a> <br>
                        <a href="mailto:email@gmail.com" class="link">email@gmail.com</a> <br>
                    </p>
                </section>
                <section class="col-lg-4 col-md-8 col-sm-10 bottom-buffer-40">
                    <header>
                        <h3>DANE DO PRZELEWÓW</h3>
                    </header>
                    <p>
                        Usługi Gastronomiczne - Jan Kowalski<br>
                        ul. Grodzka 724 20-400 Lublin<br>
                        BANK S.A. Oddział 1 W lublinie<br>
                        22 1234 1234 1234 1234 1234 1234
                    </p>
                </section>
                <div class="w-100"></div>
                <section class="col-lg-4 col-md-8 col-sm-10 bottom-buffer-40 contact-section">
                    <header>
                        <h3>GODZINY OTWARCIA</h3>
                    </header>
                    <div class="hours-container">
                        <p>Niedziela-Poniedziałek</p>
                        <span></span>
                        <p>14:00-23:00</p>
                    </div>
                    <div class="hours-container">
                        <p>Wtorek-Czwartek</p>
                        <span></span>
                        <p>14:00-00:00</p>
                    </div>
                    <div class="hours-container">
                        <p>Piątek-Sobota</p>
                        <span></span>
                        <p>12:00-02:00</p>
                    </div>
                </section>
                <section class="col-lg-4 col-md-8 col-sm-10 bottom-buffer-40">
                    <header>
                        <h3>GODZINY PRACY KUCHNII</h3>
                    </header>
                    <div class="hours-container">
                        <p>Niedziela-Poniedziałek</p>
                        <span></span>
                        <p>12:00-00:00</p>
                    </div>
                    <div class="hours-container">
                        <p>Wtorek-Środa</p>
                        <span></span>
                        <p>12:00-01:00</p>
                    </div>
                    <div class="hours-container">
                        <p>Piątek-Sobota</p>
                        <span></span>
                        <p>09:00-03:00</p>
                    </div>
                </section>
            </div>
        </article>
        <div class="row parallax-contact image-text-container">
            <div class="text-box align-self-center">
                <h2>
                    ZAMÓW JEDZENIE
                </h2>
                <h4>
                    tel. 123-456-789
                </h4>
            </div>
        </div>
    </main>
@endsection
