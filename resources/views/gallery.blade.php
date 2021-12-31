@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <main class="container-fluid justify-content-center" style="margin-top: 10vh; max-width: 70vw">
        <article class="row gallery-container justify-content-center align-content-center">
            <header>
                <h5 class="main-header">GALERIA</h5>
            </header>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/1.jpg')  }}">
                    <img src="{{ asset('img/minigallery/1.jpg') }}" class="zoom img-fluid" alt="Gallery photo 1">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/2.jpg') }}">
                    <img  src="{{ asset('img/minigallery/2.jpg') }}" class="zoom img-fluid" alt="Gallery photo 2">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/3.jpg') }}">
                    <img src="{{ asset('img/minigallery/3.jpg') }}" class="zoom img-fluid" alt="Gallery photo 3">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/4.jpg') }}">
                    <img  src="{{ asset('img/minigallery/4.jpg') }}" class="zoom img-fluid" alt="Gallery photo 4">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/5.jpg') }}">
                    <img  src="{{ asset('img/minigallery/5.jpg') }}" class="zoom img-fluid" alt="Gallery photo 5">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/6.jpg') }}">
                    <img  src="{{ asset('img/minigallery/6.jpg') }}" class="zoom img-fluid" alt="Gallery photo 6">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/7.jpg') }}">
                    <img  src="{{ asset('img/minigallery/7.jpg') }}" class="zoom img-fluid" alt="Gallery photo 7">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/8.jpg') }}">
                    <img  src="{{ asset('img/minigallery/8.jpg') }}" class="zoom img-fluid" alt="Gallery photo 8">
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8">
                <a data-fancybox="images" href="{{ asset('img/minigallery/9.jpg') }}">
                    <img  src="{{ asset('img/minigallery/9.jpg') }}" class="zoom img-fluid" alt="Gallery photo 9">
                </a>
            </div>
        </article>
    </main>
@endsection
