@extends('layouts.login_card')

@section('login-content')
    <header class="form-header text-center">
        <h2>
            Zaloguj się
        </h2>
    </header>
    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group col-md-12">
                <label for="email">Adres e-mail</label>
                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @if($errors->has('email'))
                    <div class="form-error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="password">Hasło</label>
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" style="@error('password') background-color: red @enderror">
                @if($errors->has('password'))
                    <div class="form-error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="col-md-12">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>
            <div class="row col-md-12" style="padding-top: 20px; margin: 0;">
                <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zaloguj się" style="margin-bottom: 10px;">
                <input type="button" class="form-control input-submit" value="Zarejestruj się"  onclick="window.location='{{ url("register") }}'">
                <input type="button" style="margin-top: 10px" class="form-control input-submit" value="Nie pamiętasz hasła?" onclick="window.location='{{ url("forgot-password") }}'">
            </div>
        </form>
    </div>
@endsection

