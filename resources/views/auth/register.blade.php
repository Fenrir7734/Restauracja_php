@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')
    <main id="cart-main" class=" mp-side-zero" style="width: 100%">
        <div class="row justify-content-center" style="min-height: 90vh;">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="form-container" style="max-width: 400px;">
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

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">Adres e-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Hasło</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


