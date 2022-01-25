@extends('layouts.table_card')

@section('table-content')
    <h2 style="text-align: center; margin-top: 30px">
        Konto zostało założone!
    </h2>
    <p style="text-align: center">
        Na twój adres e-mail została wysłana wiadomość z linkiem weryfikacyjnym.
    </p>
    <button id="order-return" class="form-control input-submit" style="margin-top: 30px"  onclick="window.location='{{ url("index") }}'">
        Powrót do strony głównej
    </button>
@endsection
