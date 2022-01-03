@extends('layouts.form_card')

@section('form-content')
    <header class="form-header text-center">
        <h2>
            Rezerwacja
        </h2>
    </header>
    <form id="booking-form" method="post" action="{{ route('booking-store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <label for="first-name">Imię:</label>
                <input type="text" id="first-name" name="first-name" class="form-control @error('first-name') is-invalid @enderror" value="{{ old('first-name') }}">
                @if($errors->has('first-name'))
                    <div class="form-error">{{ $errors->first('first-name') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="last-name">Nazwisko:</label>
                <input type="text" id="last-name" name="last-name" class="form-control @error('last-name') is-invalid @enderror" value="{{ old('last-name') }}">
                @if($errors->has('last-name'))
                    <div class="form-error">{{ $errors->first('last-name') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="mail">Email:</label>
                <input type="email" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail') }}">
                @if($errors->has('mail'))
                    <div class="form-error">{{ $errors->first('mail') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="phone">Telefon:</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @if($errors->has('phone'))
                    <div class="form-error">{{ $errors->first('phone') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="booking-date">Data:</label>
                <input type="date" id="booking-date" name="booking-date" class="form-control @error('date') is-invalid @enderror" value="{{ old('booking-date') }}">
                @if($errors->has('booking-date'))
                    <div class="form-error">{{ $errors->first('booking-date') }}</div>
                @endif
            </div>
            <div class="col-md-4">
                <label for="time">Godzina:</label>
                <select id="time" name="time" class="form-control @error('time') is-invalid @enderror">
                    <option value="16:30" selected>16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                    <option value="23:00">23:00</option>
                </select>
            </div>
            @if($errors->has('time'))
                <div class="form-error">{{ $errors->first('time') }}</div>
            @endif
            <div class="col-md-4">
                <label for="people">Liczba osób:</label>
                <input type="number" id="people" name="people" class="form-control @error('people') is-invalid @enderror" value="{{ old('people') }}">
                @if($errors->has('people'))
                    <div class="form-error">{{ $errors->first('people') }}</div>
                @endif
            </div>
        </div>
        <div class="row" style="padding-left: 12px; padding-right: 12px">
            <label for="note" style="padding-left: 0">Wiadomość (opcjonalne):</label>
            <textarea id="note" name="note" rows="5"></textarea>
        </div>
        <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
            <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Prześlij">
        </div>
    </form>
@endsection
