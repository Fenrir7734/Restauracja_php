@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <main class="container-fluid mp-side-zero" style="width: 100%; margin-top: 10vh">
        <div class="row align-items-center mp-side-zero" style="width: 100%">
            @if($products->count() != 0)
                @foreach($categories as $category)
                    <div class="menu-section-head-img-container mp-side-zero">
                        <img src="{{ URL::asset('img/menu/banners/' . $category->photo) }}" alt="{{ $category->name }}">
                        <div class="overlay">
                            <div class="menu-header-text-container">
                                <h1>
                                    {{ $category->name }}
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="menu-section">
                        <div class="row justify-content-center">
                            @foreach($products as $product)
                                @if($category->id == $product->category_id)
                                    <div class="col-xxl-3 col-xl-5 col-md-10 col-sm-12 menu-box">
                                        <a data-fancybox data-src="#menu-product-{{ $product->id }}">
                                            <div class="align-items-center">
                                                <img class="menu-box-img" src="{{ URL::asset('img/menu/meals/' . $product->photo) }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="menu-box-content">
                                                <h3 class="menu-box-header">
                                                    {{ $product->name }}
                                                </h3>
                                                <p class="menu-box-description">
                                                    {{ $product->description }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
                @foreach($products as $product)
                    <div id="menu-product-{{ $product->id }}" class="menu-popup" style="padding: 0; background: #191919;">
                        <div class="menu-popup-img-container">
                            <img class="menu-popup-img" src="{{ URL::asset('img/menu/meals/' . $product->photo) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="menu-popup-text-container">
                            <h3 class="menu-popup-header">
                                {{ $product->name }}
                            </h3>
                            <p class="menu-box-description">
                                {{ $product->description }}
                            </p>
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <input id="menu-product-{{ $product->id }}-input" type="number" class="form-control" min="1"  max="99" value="1">
                                    <label for="menu-product-{{ $product->id }}-input"></label>
                                    <a class="input-submit btn btn-secondar cart-button" href="{{ url('add-to-cart/'.$product->id) }}}">
                                        <i class="bi bi-cart"></i>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <p class="menu-popup-price">
                                        {{ $product->price }} zł
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="notification notification-error">
                            <p class="notification-message">Error</p>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>Brak dostępnych produktów</h2>
            @endif
        </div>
@endsection
