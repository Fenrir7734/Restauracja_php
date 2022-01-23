@extends('layouts.table_card')

@section('table-content')
    <h2 style="text-align: center; margin-top: 30px">
        Aby przejść dalej musisz zweryfikować swój adres email.
    </h2>
    <p style="text-align: center">
        Aby otrzymać ponownie e-mail z linkiem weryfikacyjnym naciśnij przycisk poniżej.
    </p>
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            Mail został wysłany
        </div>
    @endif
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="form-control input-submit">Wyślij ponownie</button>
    </form>
@endsection

