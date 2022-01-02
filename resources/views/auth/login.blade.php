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
                                Zaloguj się
                            </h2>
                        </header>
                        <article class="">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="email">Adres e-mail</label>
                                    <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Hasło</label>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" style="@error('password') background-color: red @enderror">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <script>
                                        console.log('fdasfdsf');
                                    </script>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Remember Me</label>
                                </div>
                                <div class="row col-md-12" style="padding-top: 20px; margin: 0;">
                                    <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zaloguj się" style="margin-bottom: 10px;">
                                    <input type="button" class="form-control input-submit" value="Zarejestruj się" onclick="location.href='./register.html'">
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
