@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Zamówienie
        </h2>
    </header>
    <div>
        <table class="table cart-table align-middle" id="cart-table">
            @foreach($contents as $content)
                <tr data-id="{{ $content->id }}">
                    <td class="cart-table-name" data-th="product-name">
                        {{ $content->name }}
                    </td>
                    <td class="cart-table-quantity" data-th="product-quantity">
                        <input type="number" value="{{ $content->quantity }}" class="quantity update-cart" readonly>
                    </td>
                    <td class="cart-table-price" data-th="Product">
                        {{ $content->price }} zł
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td class="cart-table-sum" colspan="2">Suma:</td>
                    <td class="cart-table-price">{{ $cart->amount }} zł</td>
                </tr>
        </table>
        @if(session()->has('err'))
            <div class="form-error" style="margin-bottom: 10px">{{ session()->remove('err') }}</div>
        @endif
        <form role="form" method="POST" action="{{ route('order-update', $cart->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="first-name">Imię:</label>
                    <input type="text" id="first-name" name="first-name" class="form-control @error('first-name') is-invalid @enderror" value="{{ $cart->first_name }}" @if($cart->status != 1) readonly @endif>
                    @if($errors->has('first-name'))
                        <div class="form-error">{{ $errors->first('first-name') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="last-name">Nazwisko:</label>
                    <input type="text" id="last-name" name="last-name" class="form-control @error('last-name') is-invalid @enderror" value="{{ $cart->last_name }}" @if($cart->status != 1) readonly @endif>
                    @if($errors->has('last-name'))
                        <div class="form-error">{{ $errors->first('last-name') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="street">Ulica:</label>
                    <input type="text" id="street" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ $cart->street }}"  @if($cart->status != 1) readonly @endif>
                    @if($errors->has('street'))
                        <div class="form-error">{{ $errors->first('street') }}</div>
                    @endif
                </div>
                <div class="col-md-3">
                    <label for="house">Nr domu:</label>
                    <input type="text" id="house" name="house" class="form-control @error('house') is-invalid @enderror" value="{{ $cart->house }}"  @if($cart->status != 1) readonly @endif>
                    @if($errors->has('house'))
                        <div class="form-error">{{ $errors->first('house') }}</div>
                    @endif
                </div>
                <div class="col-md-3">
                    <label for="flat">Nr mieszkania:</label>
                    <input type="text" id="flat" name="flat"  class="form-control @error('flat') is-invalid @enderror" @if($cart->flat) value="{{ $cart->flat }}" @endif  @if($cart->status != 1) readonly @endif>
                    @if($errors->has('flat'))
                        <div class="form-error">{{ $errors->first('flat') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="postcode">Kod pocztowy:</label>
                    <input type="text" id="postcode" name="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{ substr($cart->post_code , 0, 2) . "-" . substr($cart->post_code , 2) }}"  @if($cart->status != 1) readonly @endif>
                    @if($errors->has('postcode'))
                        <div class="form-error">{{ $errors->first('postcode') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="city">Miejscowość:</label>
                    <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $cart->city }}"  @if($cart->status != 1) readonly @endif>
                    @if($errors->has('city'))
                        <div class="form-error">{{ $errors->first('city') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="mail">Email:</label>
                    <input type="email" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ $cart->email }}"  readonly>
                    @if($errors->has('mail'))
                        <div class="form-error">{{ $errors->first('mail') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="phone">Telefon:</label>
                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $cart->phone }}"  @if($cart->status != 1) readonly @endif>
                    @if($errors->has('phone'))
                        <div class="form-error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="order-date">Data zamówienia:</label>
                    <input type="datetime-local" id="order-date" name="order-date" class="form-control @error('date') is-invalid @enderror" value="{{ substr($cart->ordered_at, 0, 10) . "T" . substr($cart->ordered_at, 11) }}"  readonly>
                    @if($errors->has('order-date'))
                        <div class="form-error">{{ $errors->first('order-date') }}</div>
                    @endif
                </div>
                <div class="col-md-4">
                    <label for="delivery-date">Data dostarczenia:</label>
                    <input type="datetime-local" id="delivery-date" name="delivery-date" class="form-control @error('date') is-invalid @enderror" @if($cart->delivered_at) value="{{ substr($cart->delivered_at, 0, 10) . "T" . substr($cart->delivered_at, 11) }}" @endif @if($cart->status != 4 && $cart->status != 5) readonly @endif step="1">
                    @if($errors->has('delivery-date'))
                        <div class="form-error">{{ $errors->first('delivery-date') }}</div>
                    @endif
                </div>
                <div class="col-md-4">
                    <label for="status">Status:</label>
                    <select type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="1" {{ $cart->status == 1 ? "selected" : "" }}>Nowe</option>
                        <option value="2" {{ $cart->status == 2 ? "selected" : "" }}>W realizacji</option>
                        <option value="3" {{ $cart->status == 3 ? "selected" : "" }}>Wysłane</option>
                        <option value="4" {{ $cart->status == 4 ? "selected" : "" }}>Zakończone</option>
                        <option value="5" {{ $cart->status == 5 ? "selected" : "" }}>Zwrócone</option>
                        <option value="6" {{ $cart->status == 6 ? "selected" : "" }}>Anulowane</option>
                    </select>
                    @if($errors->has('status'))
                        <div class="form-error">{{ $errors->first('status') }}</div>
                    @endif
                </div>
            </div>
            <div class="row" style="padding-left: 12px; padding-right: 12px">
                <label for="note" style="padding-left: 0">Dodatkowe informacje: (opcjonalne):</label>
                <textarea id="note" rows="5" name="note"  @if($cart->status != 1) readonly @endif>{{ $cart->description }}</textarea>
            </div>
            <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zapisz">
            </div>
        </form>
    </div>
@endsection
