@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Rezerwacje
        </h2>
    </header>
    <div id="cart">
        <table class="table cart-table align-middle order-history">
            <tr>
                <th>
                    Data rezerwacji
                </th>
                <th>
                    Dane
                </th>
                <th>
                    Status
                </th>
                <th></th>
            </tr>
            @if($bookings)
                @foreach($bookings as $booking)
                    <tr>
                        <td>
                            {{ $booking->booking_on_date }}
                        </td>
                        <td>
                            {{ $booking->first_name }} {{ $booking->last_name }}
                        </td>
                        <td>
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
                        </td>
                        <td style="width: 5%">
                            <a class="btn form-control btn-secondary cart-button input-submit" href="{{ route('booking-details', $booking->id) }}">
                                <i class="bi bi-arrows-fullscreen"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr style="height: 200px; text-align: center">
                    <td colspan="4">
                        <h2>Brak Rezerwacji</h2>
                    </td>
                </tr>
            @endif
        </table>
    </div>
@endsection
