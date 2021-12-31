@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')
    <main class=" mp-side-zero" style="width: 100%">
        <div class="row justify-content-center" style="min-height: 90vh;">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="form-container">
                        <header class="form-header text-center">
                            <h2>
                                Rezerwacja
                            </h2>
                        </header>
                        <form id="booking-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first-name">Imię:</label>
                                    <input type="text" id="first-name" class="form-control">
                                    <div id="first-name-error" class="form-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="last-name">Nazwisko:</label>
                                    <input type="text" id="last-name" class="form-control">
                                    <div id="last-name-error" class="form-error"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="mail">Email:</label>
                                    <input type="email" id="mail" class="form-control">
                                    <div id="mail-error" class="form-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Telefon:</label>
                                    <input type="text" id="phone" class="form-control">
                                    <div id="phone-error" class="form-error"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="date">Data:</label>
                                    <input type="date" id="date" class="form-control" value="">
                                    <div id="date-error" class="form-error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="time">Godzina:</label>
                                    <select id="time" class="form-control">
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
                                <div class="col-md-4">
                                    <label for="people">Liczba osób:</label>
                                    <input type="number" id="people" class="form-control">
                                    <div class="form-error" id="people-error"></div>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 12px; padding-right: 12px">
                                <label for="note" style="padding-left: 0">Wiadomość (opcjonalne):</label>
                                <textarea id="note" rows="5"></textarea>
                            </div>
                            <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                                <input type="button" id="booking-submit-button" class="form-control input-submit" value="Prześlij">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
