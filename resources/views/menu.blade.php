@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <main class="container-fluid mp-side-zero" style="width: 100%; margin-top: 10vh">
        <div class="row align-items-center mp-side-zero" style="width: 100%">
            <div class="menu-section-head-img-container mp-side-zero">
                <img src="img/menu/banners/pizza_img_banner.jpg" alt="Pizza & Makaron section banner">
                <div class="overlay">
                    <div class="menu-header-text-container">
                        <h1>
                            PIZZA & MAKARONY
                        </h1>
                    </div>
                </div>
            </div>
            <div class="menu-section">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pizza-1">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_veggie.jpg" alt="Vegetarian pizza image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    PIZZA WEGETARIAŃSKA
                                </h3>
                                <p class="menu-box-description">
                                    Mozzarella, sos pomidorowy, świeże pomidory, papryka, czerwona cebula, pieczarki, oliwki i czosnek
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pizza-2">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_hawaiian.jpg" alt="Hawaiian pizza image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    PIZZA HAWAJSKA
                                </h3>
                                <p class="menu-box-description">
                                    Mozzarella, sos pomidorowy, szynka i ananas
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pizza-3">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_margarita.jpg" alt="Margarita pizza image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    PIZZA MARGARITA
                                </h3>
                                <p class="menu-box-description">
                                    Sos pomidorowy, mozzarella i bazylia
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pizza-4">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_pepperoni.jpg" alt="Pepperoni pizza image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    PIZZA PEPPERONI
                                </h3>
                                <p class="menu-box-description">
                                    Mozzarella, sos pomidorowy i podwójne pepperoni
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pizza-5">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_primavera.jpg" alt="Primavera pizza image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    PIZZA PRIMAVERA
                                </h3>
                                <p class="menu-box-description">
                                    Mozzarella, sos pomidorowy, szynka, świeże pomidory, czosnek i rukola
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pasta-1">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_bolognese.jpg" alt="Spaghetti bolognese image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SPAGHETTI BOLOGNESE
                                </h3>
                                <p class="menu-box-description">
                                    Mielone mięso wołowe, duszone na czerwonym winie, boczek, marchew, pietruszka, seler i zioła
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-pasta-2">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/pizza_pasta/p_carbonara.jpg" alt="Spaghetti carbonara image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SPAGHETTI CARBONARA
                                </h3>
                                <p class="menu-box-description">
                                    Wędzona pancetta, smietana, jajka, czarny pieprz i parmezan
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center mp-side-zero" style="width: 100%">
            <div class="menu-section-head-img-container mp-side-zero">
                <img src="img/menu/banners/burger_img_banner.jpg" alt="Burger section banner">
                <div class="overlay">
                    <div class="menu-header-text-container">
                        <h1>
                            HAMBURGER
                        </h1>
                    </div>
                </div>
            </div>
            <div class="menu-section">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-1">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_north_west.jpg" alt="North-west burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    NORTH-WEST BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, podwójny boczek, ser edam, ogórek konserwowy, przysmażona cebula, musztarda
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-2">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_north.jpg" alt="North burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    NORTH BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, boczek, ser edam, ser cheddar, świeży ogórek, majonez musztardowy
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-3">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_north_east.jpg" alt="North-east burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    NORTH-EAST BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, ser cheddar, świerze ogórki, pomidor, cebula, sałata, sos ostry
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-4">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_west.jpg" alt="West burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    WEST BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, boczek, ser cheddar, jajko sadzone, czerwona cebula, majonez
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-5">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_polish.jpg" alt="Polish burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    POLISH BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, ser cheddar, papryka, podwójna cebula smażona, podwójna porcja ogórków konserwowych, majonez
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-6">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_east.jpg" alt="East burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    EAST BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, ser edam, ogórki konserwowe, czosnek, cebula smażona, majonez.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-7">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_south_west.jpg" alt="South-west burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SOUTH-WEST BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, ser cheddar, świerze ogórki, bazylia, rukola, jalapeño, musztarda
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-8">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_south.jpg" alt="South burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SOUTH BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wolowina, pieczarki smażone, cebula smażona, cebula świeża, pomidory, sałata, sos BBQ, majonez musztardowy
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-burger-9">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/burgers/b_south_east.jpg" alt="south-east burger image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SOUTH-EAST BURGER
                                </h3>
                                <p class="menu-box-description">
                                    Wołowina, boczek, ser cheddar, pieczarki smażone, ogórki konserwowe, majonez, sos indyjski, majonez
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center mp-side-zero" style="width: 100%">
            <div class="menu-section-head-img-container mp-side-zero">
                <img src="img/menu/banners/sides_img_banner.jpg" alt="Sides section banner">
                <div class="overlay">
                    <div class="menu-header-text-container">
                        <h1>
                            DODATKI
                        </h1>
                    </div>
                </div>
            </div>
            <div class="menu-section">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-sides-1">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/sides/s_chips.jpg" alt="Chips image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    FRYTKI
                                </h3>
                                <p class="menu-box-description">
                                    Proste, łódeczki lub belgijskie. Z tradycyjnych ziemniaków lub batatów. Dowolny sos do wyboru.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-sides-2">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/sides/s_onion_rings.jpg" alt="Onion rings image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    KRĄŻKI CEBULOWE
                                </h3>
                                <p class="menu-box-description">
                                    Panierowane i smażone w cieście piwnym krążki cebulowe.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-sides-3">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/sides/s_cheese.jpg" alt="Fry cheese image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    KĄSKI SEROWE
                                </h3>
                                <p class="menu-box-description">
                                    Panierowane w cieście, podawane z ketchupem i dowolnym innym sosem.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-sides-4">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/sides/s_flatbreads.jpg" alt="Flatbreads image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    PODPŁOMYKI PIWNE
                                </h3>
                                <p class="menu-box-description">
                                    Podawane ze specjalnym sosem. Dodatki do wyboru.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-sides-5">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/sides/s_caesar.jpg" alt="Caesar salad image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SAŁATKA CAESAR
                                </h3>
                                <p class="menu-box-description">
                                    Smażona pierś kurczaka, sałata rzymska, parmezan, bagietka, sos cezar, oliwa.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                        <a data-fancybox data-src="#menu-sides-6">
                            <div class="align-items-center">
                                <img class="menu-box-img" src="img/menu/meals/sides/s_tuna.jpg" alt="Tuna salad image">
                            </div>
                            <div class="menu-box-content">
                                <h3 class="menu-box-header">
                                    SAŁATKA Z TUŃCZYKIEM
                                </h3>
                                <p class="menu-box-description">
                                    Ryż, tuńczyk w oleju, kukurydza, jajka, przyprawy.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-pizza-1" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_veggie.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    PIZZA WEGETARIAŃSKA
                </h3>
                <p class="menu-box-description">
                    Mozzarella, sos pomidorowy, świeże pomidory, papryka, czerwona cebula, pieczarki, oliwki i czosnek
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pizza-1-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pizza-1-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pizza-1-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            24,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-pizza-2" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_hawaiian.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    PIZZA HAWAJSKA
                </h3>
                <p class="menu-box-description">
                    Mozzarella, sos pomidorowy, szynka i ananas
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pizza-2-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pizza-2-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pizza-2-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            29,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-pizza-3" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_margarita.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    PIZZA MARGARITA
                </h3>
                <p class="menu-box-description">
                    Sos pomidorowy, mozzarella i bazylia
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pizza-3-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pizza-3-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pizza-3-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            24,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-pizza-4" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_pepperoni.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    PIZZA PEPPERONI
                </h3>
                <p class="menu-box-description">
                    Mozzarella, sos pomidorowy i podwójne pepperoni
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pizza-4-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pizza-4-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pizza-4-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            32,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-pizza-5" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_primavera.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    PIZZA PRIMAVERA
                </h3>
                <p class="menu-box-description">
                    Mozzarella, sos pomidorowy, szynka, świeże pomidory, czosnek i rukola
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pizza-5-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pizza-5-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pizza-5-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            29,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-pasta-1" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_bolognese.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SPAGHETTI BOLOGNESE
                </h3>
                <p class="menu-box-description">
                    Mielone mięso wołowe, duszone na czerwonym winie, boczek, marchew, pietruszka, seler i zioła
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pasta-1-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pasta-1-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pasta-1-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            25,00 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-pasta-2" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/pizza_pasta/p_carbonara.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SPAGHETTI CARBONARA
                </h3>
                <p class="menu-box-description">
                    Wędzona pancetta, smietana, jajka, czarny pieprz i parmezan
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-pasta-3" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-pasta-3"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-pasta-2-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            22,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-1" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_north_west.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    NORTH-WEST BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, podwójny boczek, ser edam, ogórek konserwowy, przysmażona cebula, musztarda
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-1-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-1-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-1-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            28,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-2" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_north.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    NORTH BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, boczek, ser edam, ser cheddar, świeży ogórek, majonez musztardowy
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-2-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-2-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-2-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            31,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-3" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_north_east.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    NORTH-EAST BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, ser cheddar, świerze ogórki, pomidor, cebula, sałata, sos ostry
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-3-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-3-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-3-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            27,00 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-4" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_west.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    WEST BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, boczek, ser cheddar, jajko sadzone, czerwona cebula, majonez
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-4-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-4-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-4-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            29,50 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-5" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_polish.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    POLISH BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, ser cheddar, papryka, podwójna cebula smażona, podwójna porcja ogórków konserwowych, majonez
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-5-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-5-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-5-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            31,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-6" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_east.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    EAST BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, ser edam, ogórki konserwowe, czosnek, cebula smażona, majonez.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-6-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-6-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-6-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            27,10 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-7" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_south_west.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SOUTH-WEST BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, ser cheddar, świerze ogórki, bazylia, rukola, jalapeño, musztarda
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-7-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-7-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-7-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            29,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-8" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_south.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SOUTH BURGER
                </h3>
                <p class="menu-box-description">
                    Wolowina, pieczarki smażone, cebula smażona, cebula świeża, pomidory, sałata, sos BBQ, majonez musztardowy
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-8-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-8-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-8-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            28,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-burger-9" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/burgers/b_south_east.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SOUTH-EAST BURGER
                </h3>
                <p class="menu-box-description">
                    Wołowina, boczek, ser cheddar, pieczarki smażone, ogórki konserwowe, majonez, sos indyjski, majonez
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-burger-9-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-burger-9-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-burger-9-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            31,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-sides-1" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/sides/s_chips.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    FRYTKI
                </h3>
                <p class="menu-box-description">
                    Proste, łódeczki lub belgijskie. Z tradycyjnych ziemniaków lub batatów. Dowolny sos do wyboru.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-sides-1-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-sides-1-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-sides-1-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            13,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-sides-2" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/sides/s_onion_rings.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    KRĄŻKI CEBULOWE
                </h3>
                <p class="menu-box-description">
                    Panierowane i smażone w cieście piwnym krążki cebulowe.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-sides-2-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-sides-2-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-sides-2-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            14,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-sides-3" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/sides/s_cheese.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    KĄSKI SEROWE
                </h3>
                <p class="menu-box-description">
                    Panierowane w cieście, podawane z ketchupem i dowolnym innym sosem.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-sides-3-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-sides-3-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-sides-3-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            13,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-sides-4" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/sides/s_flatbreads.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    PODPŁOMYKI PIWNE
                </h3>
                <p class="menu-box-description">
                    Podawane ze specjalnym sosem. Dodatki do wyboru.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-sides-4-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-sides-4-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-sides-4-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            12,90 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-sides-5" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/sides/s_caesar.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SAŁATKA CAESAR
                </h3>
                <p class="menu-box-description">
                    Smażona pierś kurczaka, sałata rzymska, parmezan, bagietka, sos cezar, oliwa.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-sides-5-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-sides-5-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-sides-5-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            28,70 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
        <div id="menu-sides-6" class="menu-popup" style="padding: 0; background: #191919;">
            <div class="menu-popup-img-container">
                <img class="menu-popup-img" src="img/menu/meals/sides/s_tuna.jpg" alt="">
            </div>
            <div class="menu-popup-text-container">
                <h3 class="menu-popup-header">
                    SAŁATKA Z TUŃCZYKIEM
                </h3>
                <p class="menu-box-description">
                    Ryż, tuńczyk w oleju, kukurydza, jajka, przyprawy.
                </p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input id="menu-sides-6-input" type="number" class="form-control" min="1"  max="99" value="1">
                        <label for="menu-sides-6-input"></label>
                        <button class="input-submit btn btn-secondar cart-button">
                            <i class="bi bi-cart"></i>
                            <span id="menu-sides-6-a" style="display: none"></span>
                        </button>
                    </div>
                    <div class="col-6">
                        <p class="menu-popup-price">
                            25,80 zł
                        </p>
                    </div>
                </div>
            </div>
            <div class="notification notification-error">
                <p class="notification-message">Error</p>
            </div>
        </div>
@endsection
