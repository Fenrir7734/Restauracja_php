@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')
    <main id="cart-main" class=" mp-side-zero" style="width: 100%">
        <div class="row justify-content-center" style="min-height: 90vh;">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="cart-container">
                        <header class="form-header text-center">
                            <h2>
                                Twój koszyk
                            </h2>
                        </header>
                        <div id="cart">
                            @if(session('cart'))
                                <?php $sum = 0; ?>
                                <table class="table cart-table align-middle" id="cart-table">
                                    @foreach(session('cart') as $id => $content)
                                        <?php $sum += $content[$id]['total_price']?>
                                        <tr data-id="{{ $id }}">
                                            <td class="cart-table-name" data-th="product-name">
                                                {{ $content[$id]['name'] }}
                                            </td>
                                            <td class="cart-table-quantity" data-th="product-quantity">
                                                <input type="number" value="{{ $content[$id]['quantity'] }}" disabled>
                                            </td>
                                            <td class="cart-table-price" data-th="Product">
                                                {{ $content[$id]['price'] }} zł
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="cart-table-sum" colspan="2">Suma:</td>
                                        <td class="cart-table-price">{{ number_format($sum, 2) }} zł</td>
                                    </tr>
                                </table>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="first-name">Imię:</label>
                                                <input type="text" id="first-name" class="form-control">
                                                <div id="first-name-error" class="form-error"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="last-name">Nazwisko:</label>
                                                <input type="text" id="last-name" class="form-control">
                                                <div id="last-name-error" class="form-error"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="street">Ulica:</label>
                                                <input type="text" id="street" class="form-control">
                                                <div id="street-error" class="form-error"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="house">Nr domu:</label>
                                                <input type="text" id="house" class="form-control">
                                                <div id="house-error" class="form-error"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="flat">Nr mieszkania:</label>
                                                <input type="text" id="flat" class="form-control">
                                                <div id="flat-error" class="form-error"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="postcode">Kod pocztowy:</label>
                                                <input type="text" id="postcode" class="form-control">
                                                <div id="postcode-error" class="form-error"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city">Miejscowość:</label>
                                                <input type="text" id="city" class="form-control">
                                                <div id="city-error" class="form-error"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="mail">Email:</label>
                                                <input type="email" id="mail" class="form-control">
                                                <div id="mail-error" class="form-error"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone">Telefon:</label>
                                                <input type="text" id="phone" class="form-control">
                                                <div id="phone-error" class="form-error"></div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-left: 12px; padding-right: 12px">
                                            <label for="note" style="padding-left: 0">Dodatkowe informacje: (opcjonalne):</label>
                                            <textarea id="note" rows="5"></textarea>
                                        </div>
                                        <div style="text-align: center; margin-top: 10px">
                                            <p style="margin: 0; color: #E82B34">Płatność jedynie za pobraniem.</p>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <a class="btn form-control input-submit" href="{{ url('') }}">Anuluj</a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <a class="btn form-control input-submit" href="{{ url('') }}">Zamów</a>
                                            </div>
                                        </div>
                                    </form>
                            @else
                                <div class='row cart-empty'>
                                    <h2>W twoim koszyku nie ma żadnych produktów!</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
