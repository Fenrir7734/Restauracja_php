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
                            <form class="d-flex justify-content-around" style="margin-top: 20px" action="{{ route('order-filter') }}">
                                    <div class="">
                                        <label for="filter">Filtruj: </label>
                                        <select name="filter" id="filter" class="filter" onchange="window.location.href=this.options[this.selectedIndex].value;">
                                            <option value="{{ route('history-order', ['filter' => '0', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 0) selected @endif>Wszystkie</option>
                                            <option value="{{ route('history-order', ['filter' => '1', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 1) selected @endif>Nowe</option>
                                            <option value="{{ route('history-order', ['filter' => '2', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 2) selected @endif>W realizacji</option>
                                            <option value="{{ route('history-order', ['filter' => '3', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 3) selected @endif>Wysłane</option>
                                            <option value="{{ route('history-order', ['filter' => '4', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 4) selected @endif>Zakończone</option>
                                            <option value="{{ route('history-order', ['filter' => '5', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 5) selected @endif>Zwrócone</option>
                                            <option value="{{ route('history-order', ['filter' => '6', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 6) selected @endif>Anulowane</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="sort">Sortuj: </label>
                                        <select name="sort" id="sort" class="sort" onchange="window.location.href=this.options[this.selectedIndex].value;">
                                            <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'ordered_at', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'ordered_at' && request()->get('direction') == 'desc') selected @endif>Od najnowszego</option>
                                            <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'ordered_at', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'ordered_at' && request()->get('direction') == 'asc') selected @endif>Od najstarszego</option>
                                            <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'amount', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'amount' && request()->get('direction') == 'desc') selected @endif>Od najdroższego</option>
                                            <option value="{{ route('history-order', ['filter' => request()->get('filter'), 'sort' => 'amount', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'amount' && request()->get('direction') == 'asc') selected @endif>Od najtańszego</option>
                                        </select>
                                    </div>
                            </form>
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
                            @if($orders && count($orders) > 0)
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
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#filter').change(function () {
                var oprtionSelected = $("option:selected", this);
                console.log(oprtionSelected);
            })
        </script>
    </main>
@endsection
