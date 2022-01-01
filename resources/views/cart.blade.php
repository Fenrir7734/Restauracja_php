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
                                <table class="table cart-table align-middle" id="cart-table">
                                    @foreach(session('cart') as $id => $content)
                                        <tr>
                                            <td class="cart-table-checkbox">
                                                <input type="checkbox" value="{{ $id }}">
                                            </td>
                                            <td class="cart-table-name">
                                                {{ $content[$id]['name'] }}
                                            </td>
                                            <td class="cart-table-quantity">
                                                <input type="number" value="{{ $content[$id]['quantity'] }}" class="cart-table-quantity">
                                            </td>
                                            <td class="cart-table-price">
                                                {{ $content[$id]['price'] }} zł
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
