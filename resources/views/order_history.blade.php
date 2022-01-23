@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Zamówienia
        </h2>
    </header>
    <div id="cart">
        <div class="row" style="margin-top: 20px">
            <div class="col-lg-3 col-md-12">
                <label for="filter" class="col-form-label">Filtruj: </label>
                <div class="col-sm-12">
                    <select name="filter" id="filter" class="filter form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                        <option value="{{ route('history-order', ['filter' => '0', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 0) selected @endif>Wszystkie</option>
                        <option value="{{ route('history-order', ['filter' => '1', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 1) selected @endif>Nowe</option>
                        <option value="{{ route('history-order', ['filter' => '2', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 2) selected @endif>W realizacji</option>
                        <option value="{{ route('history-order', ['filter' => '3', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 3) selected @endif>Wysłane</option>
                        <option value="{{ route('history-order', ['filter' => '4', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 4) selected @endif>Zakończone</option>
                        <option value="{{ route('history-order', ['filter' => '5', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 5) selected @endif>Zwrócone</option>
                        <option value="{{ route('history-order', ['filter' => '6', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 6) selected @endif>Anulowane</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-12"></div>
            <div class="col-lg-3 col-md-12">
                <label for="sort" class="col-form-label">Sortuj: </label>
                <div class="col-sm-12">
                    <select name="sort" id="sort" class="sort form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                        <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'ordered_at', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'ordered_at' && request()->get('direction') == 'desc') selected @endif>Od najnowszego</option>
                        <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'ordered_at', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'ordered_at' && request()->get('direction') == 'asc') selected @endif>Od najstarszego</option>
                        <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'amount', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'amount' && request()->get('direction') == 'desc') selected @endif>Od najdroższego</option>
                        <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'amount', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'amount' && request()->get('direction') == 'asc') selected @endif>Od najtańszego</option>
                    </select>
                </div>
            </div>
        </div>
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
            @if(isset($orders) && $orders->count() > 0)
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
                        </td>
                        <td style="width: 5%">
                            <a class="btn form-control btn-secondary cart-button input-submit" href="{{ route('order-details', $order->id) }}">
                                <i class="bi bi-arrows-fullscreen"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr style="height: 200px; text-align: center">
                    <td colspan="4">
                        <h2>Brak zamówień</h2>
                    </td>
                </tr>
            @endif
        </table>
        @if($orders)
            <div  style="height: 50px">
                {{ $orders->appends($_GET)->links("pagination::custom") }}
            </div>
        @endif
    </div>
@endsection
