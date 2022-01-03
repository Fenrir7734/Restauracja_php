@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')
    <main id="cart-main" class=" mp-side-zero" style="width: 100%">
        <div class="row justify-content-center" style="min-height: 90vh;">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="cart-container">
                        <h2 style="text-align: center; margin-top: 30px">
                            Rezerwacja przebiegła pomyślnie!
                        </h2>
                        <button id="order-return" class="form-control input-submit" style="margin-top: 30px"  onclick="window.location='{{ url("index") }}'">
                            Powrót do strony głównej
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
