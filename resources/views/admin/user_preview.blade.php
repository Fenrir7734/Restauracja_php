@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Twój koszyk
        </h2>
    </header>
    <div id="cart">
        <div>
            @if($errors->has('msg'))
                <div class="alert alert-warning" role="alert" style="text-align: center; margin-top: 10px">
                    {{ $errors->first('msg') }}
                </div>
            @endif
        </div>
        @if($users)
            <table class="table" style="color: white">
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Rola</th>
                    <th></th>
                    <th></th>
                </tr>
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
            </table>

        @else
            <h2 style="min-height: 30%">Brak</h2>
        @endif
        <div class="d-flex justify-content-center">
            @if($users)
                <div class="col-lg-3 col-md-6" style="height: 50px">
                    {{ $users->links("pagination::custom") }}
                </div>
            @endif
        </div>
    </div>
@endsection
