@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Kategorie
        </h2>
    </header>
    <div id="cart">
        <div class="row" style="margin-top: 20px; margin-bottom: 20px">
            <div class="col-lg-9 col-md-12"></div>
            <div class="col-lg-3 col-md-12">
                <label for="sort" class="col-form-label">Sortuj: </label>
                <div class="col-sm-12">
                    <select name="sort" id="sort" class="sort form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                        <option value="{{ route('admin-categories-preview', ['sort' => 'id', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'id' && request()->get('direction') == 'asc') selected @endif>ID rosnąco</option>
                        <option value="{{ route('admin-categories-preview', ['sort' => 'id', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'id' && request()->get('direction') == 'desc') selected @endif>ID malejąco</option>
                        <option value="{{ route('admin-categories-preview', ['sort' => 'name', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'name' && request()->get('direction') == 'asc') selected @endif>Od A do Z</option>
                        <option value="{{ route('admin-categories-preview', ['sort' => 'name', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'name' && request()->get('direction') == 'desc') selected @endif>Od Z do A</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table cart-table align-middle order-history" style="color: white">
        @if(isset($categories) && $categories->count() > 0)
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
        @else
                <tr style="height: 200px; text-align: center">
                    <td colspan="5">
                        <h2>Brak Kategorii</h2>
                    </td>
                </tr>
        @endif
        </table>
        @if($categories)
                <div class="col-lg-3 col-md-6" style="height: 50px">
                    {{ $categories->appends($_GET)->links("pagination::custom") }}
                </div>
            @endif
        <div class="d-flex justify-content-center">
            <div class="col-lg-3 col-md-6">
                <a class="btn form-control input-submit" href="{{ route('create-category') }}">Dodaj</a>
            </div>

        </div>
    </div>
@endsection
