@extends("layouts.table_card")

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Kategoria
        </h2>
    </header>
    <div id="cart">
        <form  role="booking-form" method="POST" action="{{ route('update-admin-booking', $booking) }}" enctype="multipart/form-data" style="margin-top: 10px">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label for="first-name">Imię:</label>
                    <input type="text" id="first-name" name="first-name" class="form-control @error('first-name') is-invalid @enderror" value="{{ $booking->first_name }}">
                    @if($errors->has('first-name'))
                        <div class="form-error">{{ $errors->first('first-name') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="last-name">Nazwisko:</label>
                    <input type="text" id="last-name" name="last-name" class="form-control @error('last-name') is-invalid @enderror" value="{{ $booking->last_name }}">
                    @if($errors->has('last-name'))
                        <div class="form-error">{{ $errors->first('last-name') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="mail">Email:</label>
                    <input type="email" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ $booking->email }}">
                    @if($errors->has('mail'))
                        <div class="form-error">{{ $errors->first('mail') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="phone">Telefon:</label>
                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $booking->phone }}">
                    @if($errors->has('phone'))
                        <div class="form-error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="booking-date">Data:</label>
                    <input type="datetime-local" id="booking-date" name="booking-date" class="form-control @error('date') is-invalid @enderror" value="{{ substr($booking->booking_on_date, 0, 10) . "T" . substr($booking->booking_on_date, 11) }}">
                    @if($errors->has('booking-date'))
                        <div class="form-error">{{ $errors->first('booking-date') }}</div>
                    @endif
                </div>
                <div class="col-md-4">
                    <label for="people">Liczba osób:</label>
                    <input type="number" id="people" name="people" class="form-control @error('people') is-invalid @enderror" value="{{ $booking->number_of_people }}">
                    @if($errors->has('people'))
                        <div class="form-error">{{ $errors->first('people') }}</div>
                    @endif
                </div>
                <div class="col-md-4">
                    <label for="status">Status:</label>
                    <select type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="1" {{ $booking->status == 1 ? "selected" : "" }}>Nowe</option>
                        <option value="2" {{ $booking->status == 2 ? "selected" : "" }}>Potwierdzone</option>
                        <option value="3" {{ $booking->status == 3 ? "selected" : "" }}>Zakończone</option>
                        <option value="4" {{ $booking->status == 4 ? "selected" : "" }}>Anulowane</option>
                    </select>
                    @if($errors->has('status'))
                        <div class="form-error">{{ $errors->first('status') }}</div>
                    @endif
                </div>
            </div>
            <div class="row" style="padding-left: 12px; padding-right: 12px">
                <label for="note" style="padding-left: 0">Wiadomość (opcjonalne):</label>
                <textarea id="note" name="note" rows="5"></textarea>
            </div>
            <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zapisz">
            </div>
        </form>
    </div>
@endsection


