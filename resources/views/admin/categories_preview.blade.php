@extends("layouts.app")

@section('content')
    @include('layouts.navbar')
    <main id="cart-main" class=" mp-side-zero" style="width: 100%">
        <div class="row justify-content-center" style="min-height: 90vh;">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="cart-container">
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
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <a class="btn form-control input-submit" href="{{ route('create-category') }}">Dodaj</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
