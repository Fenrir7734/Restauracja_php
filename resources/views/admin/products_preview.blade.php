@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Twój koszyk
        </h2>
    </header>
    <div id="cart">
        @if($products)
            <table class="table" style="color: white">
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            <img src="{{ URL::asset('img/menu/meals/' . $product->photo) }}" alt="{{ $product->name }}" class="table-photo" style="max-height: 100px">
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td class="cart-table-checkbox edit-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('edit-products', $product->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="cart-table-checkbox remove-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('remove-products', $product->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <h2 style="min-height: 30%">Brak</h2>
        @endif
        @if($products)
                <div class="col-lg-12 col-md-12 justify-content-center" style="height: 50px">
                    {{ $products->links("pagination::custom") }}
                </div>
            @endif
        <div class="d-flex justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a class="btn form-control input-submit" href="{{ route('create-products') }}">Dodaj</a>
            </div>
        </div>
    </div>
@endsection
