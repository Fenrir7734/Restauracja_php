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
                    <div id="menu-product-{{ $product->id }}" class="menu-popup" style="padding: 0; background: #191919;" >
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
                                <div class="col-6" data-id="{{ $product->id }}">
                                    <input id="menu-product-{{ $product->id }}-input" type="number" class="form-control quantity" min="1"  max="99" value="1">
                                    <label for="menu-product-{{ $product->id }}-input"></label>
                                    <button class="input-submit btn btn-secondar cart-button add-to-cart">
                                        <i class="bi bi-cart"></i>
                                    </button>
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
                    @if(session()->has('err'))
                        <div id="noterr" class="notification notification-error" style="display: block; opacity: 1">
                            <p class="notification-message">{{ session()->get('err') }}</p>
                        </div>
                        {{ session()->remove('err') }}
                    @endif
                    @if(session()->has('msg'))
                        <div id="notmsg" class="notification notification-error" style="display: block; opacity: 1; background-color: green">
                            <p class="notification-message">{{ session()->get('msg') }}</p>
                        </div>
                        {{ session()->remove('msg') }}
                    @endif
                <script>
                    $('.add-to-cart').click(function (event) {
                        event.preventDefault();
                        var element = $(this);

                        $.ajax({
                            url: '{{ route('add-to-cart') }}',
                            method: "patch",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: element.parents("div").attr("data-id"),
                                quantity: element.parents("div").find(".quantity").val()
                            },
                            success: function (response) {
                                window.location.reload();
                            }
                        })
                    });


                    var noterror = document.getElementById('noterr');
                    if (noterror) {
                        noterror.addEventListener('click', () => {
                            noterror.style.opacity = "0";
                            setTimeout(function () {
                                noterror.style.display = "none";
                            }, 500);
                        });
                    }

                    var notemessage = document.getElementById('notmsg');
                    if (notemessage) {
                        notemessage.addEventListener('click', () => {
                            notemessage.style.opacity = "0";
                            setTimeout(function () {
                                notemessage.style.display = "none";
                            }, 500);
                        });
                    }

                </script>
            @else
                <div class="d-flex justify-content-center align-items-center" style="height: 50vh">
                    <h2>Brak dostępnych produktów</h2>
                </div>
            @endif

        </div>
    </main>
@endsection
