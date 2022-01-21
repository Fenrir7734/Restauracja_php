@extends('layouts.table_card')

@section('table-content')
    <h2 style="text-align: center; margin-top: 30px">
        Ups... Obawiam się, że taka strona nie istnieje.
    </h2>
    <button id="order-return" class="form-control input-submit" style="margin-top: 30px"  onclick="window.location='{{ url("index") }}'">
        Powrót do strony głównej
    </button>
@endsection
