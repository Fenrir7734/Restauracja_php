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
                                        <select name="filter" id="filter" class="filter">
                                            <option value="0">Wszystkie</option>
                                            <option value="1">Nowe</option>
                                            <option value="2">W realizacji</option>
                                            <option value="3">Wysłane</option>
                                            <option value="4">Zakończone</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="sort">Sortuj: </label>
                                        <select name="sort" id="sort" class="sort">
                                            <option value="0">Od najnowszego</option>
                                            <option value="1">Od najstarszego</option>
                                            <option value="2">Od najdroższego</option>
                                            <option value="3">Od najtańszego</option>
                                        </select>
                                    </div>
                                   <div>
                                       <input type="submit">
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
    <script type="text/javascript">
        $('.filter').change(function () {
            var valFilter = $(this).find(':selected')[0].value;
            var valSort = $("select[name=sort]").val();
            var url = "{{ route('order-filter', ['filter' => ":filter", 'sort' => ":sort"]) }}"
            url = url.replace(":filter", valFilter).replace(":sort", valSort);
            window.location.href = "{{ URL::to('history-order/2/2') }}"

            $.ajax({
                url: {{ route("order-filter") }},
                type: 'POST',
                data: {
                    filter: $(this).find(':selected')[0].value,
                    sort: $("select[name=sort]").val();
                },
            })
        })
    </script>
@endsection
