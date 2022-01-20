@extends("layouts.app")

@section('content')
        <header class="intro gradient">
            <div class="intro-text-container">
                <div class="section-box">
                    <h1>STREET FOOD</h1>
                    <p>
                        Dokładamy wszelkich starań, aby zapewnić jak najlepsze doznania płynące z serwowanych przez nas dań
                    </p>
                </div>
            </div>
        </header>

        @include('layouts.navbar')

        <main class="container-fluid" style="margin-top: 6vh">
            <article class="row justify-content-center text-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <header>
                        <h2>WITAJCIE W STREET FOOD</h2>
                    </header>
                    <p>
                        STREET FOOD oferuje najlepsze burgery i przystawki w mieście z szeregiem wyjątkowych smaków których nie znajdziesz nigdzie indziej. Nie masz ochoty na Burgera? Spróbuj ręcznie panierowane kąski serowe, smakowitą pizze na cienkim cieście i spaghetti z wyrabianym przez nas makaronem. STREET FOOD z pewnością zaspokoi każdy apetyt! Twój posiłek w STREET FOOD będzie pyszny od początku do końca!
                    </p>
                </div>
            </article>
            <article class="row text-center justify-content-center section-box">
                <div class="col-xl-4 col-md-6 align-self-center">
                    <header>
                        <h2>O NAS</h2>
                    </header>
                    <p>
                        STREET FOOD to jedna z najpopularniejszych restauracji specjalizujących się w kuchni amerykańskiej i włoskiej w Lublinie. Jest to wyjątkowe miejsce które może poszczycić się bogatą historią, niepowtarzalnym relaksującym klimatem, interesującą aranżacją wnętrza oraz wysmienitym jedzeniem. Restauracja znajduje się przy ul. Grodzka 724.
                    </p>
                </div>
                <aside class="col-xl-4 col-lg-6 col-md-10 align-self-center">
                    <div class="row">
                        <div class="col-6">
                            <div class="side-img-box">
                                <img src="{{ URL::asset('img/index_side_1.jpg') }}" class="img-fluid pan" alt="Right side image">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="side-img-box">
                                <img src="{{ URL::asset('img/index_side_2.jpg') }}" class="img-fluid pan" alt="Left side image">
                            </div>
                        </div>
                    </div>
                </aside>
            </article>
            <div class="row parallax-index intro-text-container">
                <div class="text-box align-self-center">
                    <h2 class="quote">
                        “If more of us valued food and cheer and song above hoarded gold, it would be a merrier world.”
                    </h2>
                    <p class="quote-caption">
                        J.R.R. Tolkien, The Hobbit
                    </p>
                </div>
            </div>
            <article class="row justify-content-center text-center" style="height: 500px">
                <div class="col-xl-4 col-md-6 align-self-center" style="max-width: 600px">
                    <header>
                        <h3 style="margin-bottom: 60px">
                            REZERWACJE
                        </h3>
                    </header>
                    <p>
                        Możliwość rezerwacji 5 miesięcy w przód.<br><br>
                        Rezerwację stolika na wieczór możesz dokonać dzwoniąc na numer <a href="tel:123456789" class="link">123 456 789</a> lub <a href="mailto:email@gmail.com" class="link">mailowo</a> . Dzwonić można od godziny 14:00 do 20:00 przez cały tydzień. Poza tymi godzinnami prosimy o zostawienie wiadomości, postaramy się odpowiedzieć najszybciej jak to będzie możliwe.<br><br>
                        Jeżeli chcesz zorganizować u nas imprezę dla grupy większej niż 20 osób prosimy skorzystać z naszego <a href="{{ route('booking-create') }}" class="link">formularza rezerwacyjnego</a> .
                    </p>
                </div>
            </article>
        </main>
@endsection
