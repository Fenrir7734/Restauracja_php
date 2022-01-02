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
                                Zamówienia
                            </h2>
                        </header>
                        <div id="cart">
                            <table class="table cart-table align-middle order-history">
                                <tr>
                                    <th>
                                        Data
                                    </th>
                                    <th>
                                        Cena
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th></th>
                                </tr>
                                @foreach($orders as $order)
                                    <tr data-id="{{ $order->id }}">
                                        <td>
                                            {{ $order->ordered_at }}
                                        </td>
                                        <td>
                                            {{ $order->amount }} zł
                                        </td>
                                        <td>
                                            @switch($order->status)
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
                                                @default
                                                    Nieznany status
                                                @break
                                            @endswitch
                                        </td>
                                        <td style="width: 5%">
                                            <a class="btn form-control btn-secondary cart-button input-submit" href="{{ route('order-details', $order->id) }}">
                                                <i class="bi bi-arrows-fullscreen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
