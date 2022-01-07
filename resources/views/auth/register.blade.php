@extends('layouts.login_card')

@section('login-content')
    <header class="form-header text-center">
        <h2>
            Zrejestruj się
        </h2>
    </header>
    <article class="">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group col-md-12">
                <label for="name">Nazwa</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @if($errors->has('email'))
                    <div class="form-error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="email">Adres e-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @if($errors->has('password'))
                    <div class="form-error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="password">Hasło</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @if($errors->has('email'))
                    <div class="form-error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="password-confirm">Powtórz Hasło</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="row col-md-12" style="padding-top: 20px; margin: 0;">
                <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zrejestruj się" style="margin-bottom: 10px;">
            </div>
        </form>
    </article>
@endsection


