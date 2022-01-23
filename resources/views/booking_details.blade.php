@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Rezerwacja
        </h2>
    </header>
    <div id="cart" style="margin-top: 30px; text-align: center">
        <div class="row justify-content-center align-content-center mp-side-zero order-details-container">
            <div class="col-xl-4 col-md-12">
                <h5>
                    Dane
                </h5>
                <p>
                    {{ $booking->first_name }} {{ $booking->last_name }}<br>
                    <br>
                    Tel: {{ $booking->phone }} <br>
                    e-mail: {{ $booking->email }}
                </p>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="col-12">
                    <h5>
                        Data złożenia
                    </h5>
                    <p>
                        {{ $booking->booking_send_date }}
                    </p>
                </div>
                <div class="col-12">
                    <h5>
                        Data rezerwacji
                    </h5>
                    <p>
                        {{ $booking->booking_on_date }}
                    </p>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="col-12">
                    <h5>
                        Liczba osób
                    </h5>
                    <p>
                        {{ $booking->number_of_people }}
                    </p>
                </div>
                <div class="col-12">
                    <h5>
                        Status
                    </h5>
                    <p>
                        @switch($booking->status)
                            @case(1)
                            Nowe
                            @break
                            @case(2)
                            Potwierdzone
                            @break
                            @case(3)
                            Zakończone
                            @break
                            @case(4)
                            Anulowane
                            @break
                            @default
                            Nieznany status
                            @break
                        @endswitch
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-content-center mp-side-zero order-details-container">
            <h5 style="text-align: center;">
                Opis
            </h5>
            <p>
                @if($booking->description)
                    {{ $booking->description }}
                @else
                    Brak
                @endif
            </p>
        </div>
        @if($booking->status === 1)
            <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                <a class="btn form-control btn-secondary cart-button input-submit" href="{{ route('booking-cancel', $booking->id) }}">
                    Anuluj
                </a>
            </div>
        @endif
    </div>
@endsection
