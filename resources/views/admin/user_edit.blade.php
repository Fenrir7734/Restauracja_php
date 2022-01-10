@extends("layouts.table_card")

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Użytkownik
        </h2>
    </header>
    <div id="cart">
        <form method="POST" action="{{ route('update-user', $user->id) }}" enctype="multipart/form-data" style="margin-top: 10px">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="name">Nazwa:</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                    @if($errors->has('name'))
                        <div class="form-error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-md-6 col-12">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    @if($errors->has('email'))
                        <div class="form-error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="verified">Zweryfikowany:</label>
                    <input type="text" id="verified" name="verified" class="form-control @error('verified') is-invalid @enderror" value="{{ $user->email_verified_at ? $user->email_verified_at : "Nie" }}">
                </div>
                <div class="col-md-6 col-12">
                    <label for="role">Rola:</label>
                    <select type="text" id="role" name="role" class="form-control @error('category') is-invalid @enderror">
                        <option value="0" {{ $user->role_as == 0 ? "selected" : "" }}>User</option>
                        <option value="1" {{ $user->role_as == 1 ? "selected" : "" }}>Admin</option>
                    </select>
                </div>
            </div>
            <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zapisz">
            </div>
            <div class="row" style=" padding-left: 12px; padding-right: 12px; padding-top: 5px">
                <a type="button" id="booking-submit-button" class="btn btn-secondary cart-button input-submit" href="{{ route('verify-user', $user->id) }}">Zweryfikuj konto</a>
            </div>
            <div class="row" style=" padding-left: 12px; padding-right: 12px">
                <a type="button" id="booking-submit-button" class="btn btn-secondary cart-button input-submit" href="{{ route('reset-user', $user->id) }}">Zresetuj hasło</a>
            </div>
        </form>
        @if(session()->has('msg'))
            <div class="alert alert-success" style="text-align: center">
                {{ session()->get('msg') }}
            </div>
        @endif
    </div>
@endsection
