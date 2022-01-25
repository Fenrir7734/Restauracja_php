@extends('layouts.table_card')

@section('table-content')
    <h2 style="text-align: center; margin-top: 30px">
        Hasło zostało zmienione!
    </h2>
    <button id="order-return" class="form-control input-submit" style="margin-top: 30px"  onclick="window.location='{{ url("index") }}'">
        Powrót do strony głównej
    </button>
@endsection
