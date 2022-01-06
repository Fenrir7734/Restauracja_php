@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Konto
        </h2>
    </header>
    <div id="cart" style="margin-top: 30px; text-align: center" >
        <div class="row justify-content-center align-content-center mp-side-zero order-details-container">
            <form  role="booking-form" method="POST" action="{{ route('update-account') }}" enctype="multipart/form-data" style="margin-top: 10px">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-12 start-center" style="font-size: 22px" >
                        Nazwa:
                    </div>
                    <div class="col-lg-8 col-md-12" style=" font-size: 22px">
                        {{ $account->name }}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-lg-4 col-md-12 start-center" style="font-size: 22px">
                        Adres e-mail:
                    </div>
                    <div class="col-lg-8 col-md-12" style="font-size: 22px">
                        {{ $account->email }}
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-4 col-md-12 align-content-center" style="text-align: start; font-size: 22px" >
                        <label class="align-middle" for="password">Aktualne Hasło:</label>
                    </div>
                    <div class="col-lg-8 col-md-12 align-content-center">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @if($errors->has('password'))
                                <div class="form-error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-4 align-content-center" style="text-align: start; font-size: 22px" >
                        <label class="align-middle" for="new_password">Nowe hasło:</label>
                    </div>
                    <div class="col-lg-8 align-content-center">
                        <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                        @if($errors->has('new_password'))
                            <div class="form-error">{{ $errors->first('new_password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-4 col-md-12 align-content-center" style="text-align: start; font-size: 22px" >
                        <label class="align-middle" for="new_password_again">Powtórz hasło:</label>
                    </div>
                    <div class="col-lg-8 col-md-12 align-content-center">
                        <input type="password" id="new_password_again" name="new_password_again" class="form-control @error('new_password') is-invalid @enderror">
                    </div>
                </div>
                <div style="" class="form-error">
                    <span style="color: green; font-size: 16px">
                        @if(session()->has('message'))
                            {{ session()->get('message') }}
                        @endif
                    </span>
                </div>
                <div class="row justify-content-end" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                    <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zapisz" style="max-width: 100px">
                </div>
            </form>
        </div>
    </div>
@endsection
