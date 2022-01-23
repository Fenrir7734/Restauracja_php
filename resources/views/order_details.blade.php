@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Zamówienie
        </h2>
    </header>
    <div id="cart">
        <table class="table cart-table align-middle" id="cart-table">
            <tr>
                <td class="cart-table-name" data-th="product-name">
                    Nazwa
                </td>
                <td class="" data-th="product-quantity" style="color: white; font-size: 22px">
                    Ilość
                </td>
                <td class="cart-table-price" data-th="Product">
                    Cena
                </td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td class="cart-table-name" data-th="product-name">
                        {{ $product->name }}
                    </td>
                    <td class="" data-th="product-quantity" style="color: white; font-size: 22px">
                        {{ $product->quantity }}
                    </td>
                    <td class="cart-table-price" data-th="Product">
                        {{ $product->price }} zł
                    </td>
                </tr>
            @endforeach
            <tr>
                <td class="cart-table-sum" colspan="2">Suma:</td>
                <td class="cart-table-price">{{ $cart->amount }} zł</td>
            </tr>
        </table>
        <div class="form-header text-center">
            <h2>
                Szczegóły
            </h2>
            <div class="row justify-content-center align-content-center mp-side-zero order-details-container">
                <div class="col-xl-4 col-md-12">
                    <h5>
                        Adres wysyłki
                    </h5>
                    <p>
                        {{ $address->first_name }} {{ $address->last_name }}<br>
                        {{ $address->street }} {{ $address->house }}
                        @if($address->flat)
                            / {{ $address->flat }}
                        @endif
                        <br>
                        {{ $address->city }}, <?php echo substr_replace($address->post_code, "-", 2, 0)?><br>
                        Tel: {{ $address->phone }}
                    </p>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="col-xl-12">
                        <h5>
                            Data złożenia
                        </h5>
                        <p>
                            {{ $cart->ordered_at }}
                        </p>
                    </div>
                    <div class="col-12">
                        <h5>
                            Data dostarczenia
                        </h5>
                        <p>
                            @if($cart->delivered_at)
                                {{ $cart->delivered_at }}
                            @else
                                Brak
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <h5>
                        Status
                    </h5>
                    <p>
                        @switch($cart->status)
                            @case(1)
                            Nowe
                            @break
                            @case(2)
                            W realizacji
                            @break
                            @case(3)
                            Wysłane
                            @break
                            @case(4)
                            Zakończone
                            @break
                            @case(5)
                            Zwrócone
                            @break
                            @case(6)
                            Anulowane
                            @break
                            @default
                            Nieznany status
                            @break
                        @endswitch
                    </p>
                </div>
            </div>
            <div class="row justify-content-center align-content-center mp-side-zero order-details-container">
                <h5 style="text-align: center;">
                    Opis
                </h5>
                <p>
                    @if($cart->description)
                        {{ $cart->description }}
                    @else
                        Brak
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
