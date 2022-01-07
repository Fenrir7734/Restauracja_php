@extends('layouts.login_card')

@section('login-content')
    <header class="form-header text-center">
        <h2>
            Reset hasła
        </h2>
    </header>
    <article class="">
        @if (session('status'))
            <div class="alert alert-success" role="alert" style="margin-top: 5px">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group col-md-12">
                <label for="email">Adres e-mail</label>
                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @if($errors->has('email'))
                    <div class="form-error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="row col-md-12" style="padding-top: 20px; margin: 0;">
                <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zresetuj" style="margin-bottom: 10px;">
            </div>
        </form>
    </article>
@endsection
