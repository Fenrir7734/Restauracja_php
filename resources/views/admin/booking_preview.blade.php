@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Rezerwacje
        </h2>
    </header>
    <div id="cart">
        <div class="row" style="margin-top: 20px">
            <div class="col-lg-3 col-md-12">
                <label for="filter" class="col-form-label">Filtruj: </label>
                <div class="col-sm-12">
                    <select name="filter" id="filter" class="filter form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                        <option value="{{ route('preview-admin-booking', ['filter' => '0', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 0) selected @endif>Wszystkie</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => '1', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 1) selected @endif>Nowe</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => '2', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 2) selected @endif>Potwierdzone</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => '3', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 3) selected @endif>Zakończone</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => '4', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 4) selected @endif>Anulowane</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-12"></div>
            <div class="col-lg-3 col-md-12">
                <label for="sort" class="col-form-label">Sortuj: </label>
                <div class="col-sm-12">
                    <select name="sort" id="sort" class="sort form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                        <option value="{{ route('preview-admin-booking', ['filter' => request()->get('filter'), 'sort' => 'id', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'booking_on_date' && request()->get('direction') == 'asc') selected @endif>ID rosnąco</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => request()->get('filter'), 'sort' => 'id', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'booking_on_date' && request()->get('direction') == 'desc') selected @endif>ID malejąco</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => request()->get('filter'), 'sort' => 'booking_on_date', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'booking_on_date' && request()->get('direction') == 'desc') selected @endif>Od najnowszego</option>
                        <option value="{{ route('preview-admin-booking', ['filter' => request()->get('filter'), 'sort' => 'booking_on_date', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'booking_on_date' && request()->get('direction') == 'asc') selected @endif>Od najstarszego</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table  cart-table align-middle order-history" style="color: white">
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Data</th>
                <th></th>
                <th></th>
            </tr>
        @if(isset($bookings) && $bookings->count() > 0)
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
                @else
                    <tr style="height: 200px; text-align: center">
                        <td colspan="5">
                            <h2>Brak Rezerwacji</h2>
                        </td>
                    </tr>
                @endif
            </table>
        <div class="d-flex justify-content-center">
            @if($bookings)
                <div class="col-lg-3 col-md-6" style="height: 50px">
                    {{ $bookings->appends($_GET)->links("pagination::custom") }}
                </div>
            @endif
        </div>
    </div>
@endsection
