@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Produkty
        </h2>
    </header>
    <div class="row" style="margin-top: 20px; margin-bottom: 20px">
        <div class="col-lg-3 col-md-12">
            <label for="filter" class="col-form-label">Filtruj: </label>
            <div class="col-sm-12">
                <select name="filter" id="filter" class="filter form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    <option value="{{ route('admin-products-preview', ['filter' => '-1', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == '-1') selected @endif>Wszystkie</option>
                    @foreach($categories as $category)
                        <option value="{{ route('admin-products-preview', ['filter' => $category->id, 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-12"></div>
        <div class="col-lg-3 col-md-12">
            <label for="sort" class="col-form-label">Sortuj: </label>
            <div class="col-sm-12">
                <select name="sort" id="sort" class="sort form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    <option value="{{ route('admin-products-preview', ['filter' => request()->get('filter'), 'sort' => 'id', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'id' && request()->get('direction') == 'asc') selected @endif>ID rosnąco</option>
                    <option value="{{ route('admin-products-preview', ['filter' => request()->get('filter'), 'sort' => 'id', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'id' && request()->get('direction') == 'desc') selected @endif>ID malejąco</option>
                    <option value="{{ route('admin-products-preview', ['filter' => request()->get('filter'), 'sort' => 'name', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'name' && request()->get('direction') == 'asc') selected @endif>Od A do Z</option>
                    <option value="{{ route('admin-products-preview', ['filter' => request()->get('filter'), 'sort' => 'name', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'name' && request()->get('direction') == 'desc') selected @endif>Od Z do A</option>
                </select>
            </div>
        </div>
    </div>
    <div id="cart">
        <table class="table cart-table align-middle order-history" style="color: white">
        @if(isset($products) && $products->count() > 0)
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
        @else
                <tr style="height: 200px; text-align: center">
                    <td colspan="5">
                        <h2>Brak Produktów</h2>
                    </td>
                </tr>
        @endif
        </table>
        @if($products)
                <div class="col-lg-12 col-md-12 justify-content-center" style="height: 50px">
                    {{ $products->appends($_GET)->links("pagination::custom") }}
                </div>
            @endif
        <div class="d-flex justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a class="btn form-control input-submit" href="{{ route('create-products') }}">Dodaj</a>
            </div>
        </div>
    </div>
@endsection
