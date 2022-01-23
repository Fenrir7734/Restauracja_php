@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Użytkownicy
        </h2>
    </header>
    <div class="row" style="margin-top: 20px">
        <div class="col-lg-3 col-md-12">
            <label for="filter" class="col-form-label">Filtruj: </label>
            <div class="col-sm-12">
                <select name="filter" id="filter" class="filter form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    <option value="{{ route('preview-user', ['filter' => '-1', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == -1) selected @endif>Wszystkie</option>
                    <option value="{{ route('preview-user', ['filter' => '0', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 0) selected @endif>Użytkownik</option>
                    <option value="{{ route('preview-user', ['filter' => '1', 'sort' => request()->get('sort'), 'direction' =>  request()->get('direction')]) }}" @if(request()->get('filter') == 1) selected @endif>Admin</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-12"></div>
        <div class="col-lg-3 col-md-12">
            <label for="sort" class="col-form-label">Sortuj: </label>
            <div class="col-sm-12">
                <select name="sort" id="sort" class="sort form-control" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    <option value="{{ route('preview-user', ['filter' => request()->get('filter'), 'sort' => 'id', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'id' && request()->get('direction') == 'asc') selected @endif>ID rosnąco</option>
                    <option value="{{ route('preview-user', ['filter' => request()->get('filter'), 'sort' => 'id', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'id' && request()->get('direction') == 'desc') selected @endif>ID malejąco</option>
                    <option value="{{ route('preview-user', ['filter' => request()->get('filter'), 'sort' => 'name', 'direction' => 'asc']) }}" @if(request()->get('sort') == 'name' && request()->get('direction') == 'asc') selected @endif>Od A do Z</option>
                    <option value="{{ route('preview-user', ['filter' => request()->get('filter'), 'sort' => 'name', 'direction' => 'desc']) }}" @if(request()->get('sort') == 'name' && request()->get('direction') == 'desc') selected @endif>Od Z do A</option>
                </select>
            </div>
        </div>
    </div>
    <div id="cart">
        <div>
            @if($errors->has('msg'))
                <div class="alert alert-warning" role="alert" style="text-align: center; margin-top: 10px">
                    {{ $errors->first('msg') }}
                </div>
            @endif
        </div>
        <table class="table cart-table align-middle order-history" style="color: white">
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Rola</th>
                <th></th>
                <th></th>
            </tr>
        @if(isset($users) && $users->count() > 0)
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            @if($user->role_as == 0)
                                User
                            @else
                                Admin
                            @endif
                        </td>

                        <td class="cart-table-checkbox edit-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('edit-user', $user->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="cart-table-checkbox remove-category" data-th="">
                            <a class="btn btn-secondary cart-button input-submit remove-from-cart" href="{{ route('remove-user', $user->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

        @else
            <tr style="height: 200px; text-align: center">
                <td colspan="5">
                    <h2>Brak Użytkowników</h2>
                </td>
            </tr>
        @endif
        </table>

        <div class="d-flex justify-content-center">
            @if($users)
                <div class="col-lg-3 col-md-6" style="height: 50px">
                    {{ $users->appends($_GET)->links("pagination::custom") }}
                </div>
            @endif
        </div>
    </div>
@endsection
