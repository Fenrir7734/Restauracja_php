@extends('layouts.table_card')

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Twój koszyk
        </h2>
    </header>
    <div id="cart">
        @if(session('cart'))
            <?php $sum = 0; ?>
            <table class="table cart-table align-middle" id="cart-table">
                @foreach(session('cart') as $id => $content)
                    <?php $sum += $content[$id]['total_price']?>
                    <tr data-id="{{ $id }}">
                        <td class="cart-table-name" data-th="product-name">
                            {{ $content[$id]['name'] }}
                        </td>
                        <td class="cart-table-quantity" data-th="product-quantity">
                            <input type="number" value="{{ $content[$id]['quantity'] }}" disabled>
                        </td>
                        <td class="cart-table-price" data-th="Product">
                            {{ $content[$id]['price'] }} zł
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="cart-table-sum" colspan="2">Suma:</td>
                    <td class="cart-table-price">{{ number_format($sum, 2) }} zł</td>
                </tr>
            </table>
            <form method="POST" action="{{ route('store-order') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name">Imię:</label>
                        <input type="text" id="first-name" name="first-name" class="form-control @error('first-name') is-invalid @enderror" value="{{ old('first-name') }}" required>
                        @if($errors->has('first-name'))
                            <div class="form-error">{{ $errors->first('first-name') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="last-name">Nazwisko:</label>
                        <input type="text" id="last-name" name="last-name" class="form-control @error('last-name') is-invalid @enderror" value="{{ old('last-name') }}" required>
                        @if($errors->has('last-name'))
                            <div class="form-error">{{ $errors->first('last-name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="street">Ulica:</label>
                        <input type="text" id="street" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}" required>
                        @if($errors->has('street'))
                            <div class="form-error">{{ $errors->first('street') }}</div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label for="house">Nr domu:</label>
                        <input type="text" id="house" name="house" class="form-control @error('house') is-invalid @enderror" value="{{ old('house') }}" required>
                        @if($errors->has('house'))
                            <div class="form-error">{{ $errors->first('house') }}</div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label for="flat">Nr mieszkania:</label>
                        <input type="text" id="flat" name="flat"  class="form-control @error('flat') is-invalid @enderror" value="{{ old('flat') }}">
                        @if($errors->has('flat'))
                            <div class="form-error">{{ $errors->first('flat') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="postcode">Kod pocztowy:</label>
                        <input type="text" id="postcode" name="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{ old('postcode') }}" required>
                        @if($errors->has('postcode'))
                            <div class="form-error">{{ $errors->first('postcode') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="city">Miejscowość:</label>
                        <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" required>
                        @if($errors->has('city'))
                            <div class="form-error">{{ $errors->first('city') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="mail">Email:</label>
                        <input type="email" id="mail" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail') }}" required>
                        @if($errors->has('mail'))
                            <div class="form-error">{{ $errors->first('mail') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Telefon:</label>
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                        @if($errors->has('phone'))
                            <div class="form-error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row" style="padding-left: 12px; padding-right: 12px">
                    <label for="note" style="padding-left: 0">Dodatkowe informacje: (opcjonalne):</label>
                    <textarea id="note" rows="5" name="note" >{{ old('note') }}</textarea>
                </div>
                <div style="text-align: center; margin-top: 10px">
                    <p style="margin: 0; color: #E82B34">Płatność jedynie za pobraniem.</p>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <input type="button" class="btn form-control input-submit" value="Anuluj">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <button type="submit" class="btn form-control input-submit">Zamów</button>
                    </div>
                </div>
            </form>
        @else
            <div class='row cart-empty'>
                <h2>W twoim koszyku nie ma żadnych produktów!</h2>
            </div>
        @endif
    </div>
@endsection
