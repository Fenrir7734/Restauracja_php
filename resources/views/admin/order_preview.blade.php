@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Twój koszyk
        </h2>
    </header>
    <div id="cart">
        @if($orders)
            <table class="table" style="color: white">
                @foreach($orders as $order)
                    <tr>
                        <td>
                            {{ $order->first_name }} {{ $order->last_name }}
                        </td>
                        <td>
                            {{ $order->ordered_at }}
                        </td>
                        <td>
                            {{ $order->amount }}
                        </td>
                        <td class="cart-table-checkbox edit-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('order-edit', $order->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="cart-table-checkbox remove-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('order-remove', $order->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>

        @else
            <h2 style="min-height: 30%">Brak</h2>
        @endif
        @if($orders)
            <div class="col-lg-3 col-md-6" style="height: 50px">
                {{ $orders->links("pagination::custom") }}
            </div>
        @endif
    </div>
@endsection
