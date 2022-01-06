@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Twój koszyk
        </h2>
    </header>
    <div id="cart">
        @if($bookings)
            <table class="table" style="color: white">
                <tr>
                    <th>ID</th>
                    <th>Imię</th>
                    <th>Data</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($bookings as $booking)
                    <tr>
                        <td>
                            {{ $booking->id }}
                        </td>
                        <td>
                            {{ $booking->first_name }} {{ $booking->last_name }}
                        </td>
                        <td>
                            {{ $booking->booking_on_date }}
                        </td>

                        <td class="cart-table-checkbox edit-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('edit-admin-booking', $booking->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="cart-table-checkbox remove-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('remove-admin-booking', $booking->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>

        @else
            <h2 style="min-height: 30%">Brak</h2>
        @endif
        <div class="d-flex justify-content-center">
            @if($bookings)
                <div class="col-lg-3 col-md-6" style="height: 50px">
                    {{ $bookings->links("pagination::custom") }}
                </div>
            @endif
        </div>
    </div>
@endsection
