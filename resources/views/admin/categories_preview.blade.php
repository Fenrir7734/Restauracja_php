@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Twój koszyk
        </h2>
    </header>
    <div id="cart">
        @if($categories)
            <table class="table" style="color: white">
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            <img src="{{ URL::asset('img/menu/banners/' . $category->photo) }}" alt="{{ $category->name }}" class="table-photo">
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td class="cart-table-checkbox edit-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('edit-category', $category->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="cart-table-checkbox remove-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('remove-category', $category->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>

        @else
            <h2 style="min-height: 30%">Brak</h2>
        @endif
        @if($categories)
                <div class="col-lg-3 col-md-6" style="height: 50px">
                    {{ $categories->links("pagination::custom") }}
                </div>
            @endif
        <div class="d-flex justify-content-center">
            <div class="col-lg-3 col-md-6">
                <a class="btn form-control input-submit" href="{{ route('create-category') }}">Dodaj</a>
            </div>

        </div>
    </div>
@endsection
