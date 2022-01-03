@extends("layouts.app")

@section('content')
    @include('layouts.navbar')
    <main id="cart-main" class=" mp-side-zero" style="width: 100%">
        <div class="row justify-content-center" style="min-height: 90vh;">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="cart-container">
                        <header class="form-header text-center">
                            <h2>
                                Produkt
                            </h2>
                        </header>
                        <div id="cart">
                            <form  role="booking-form" method="POST" action="{{ route('store-products') }}" enctype="multipart/form-data" style="margin-top: 10px">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Nazwa:</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="form-error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">Zdjęcie:</label>
                                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                        @if($errors->has('image'))
                                            <div class="form-error">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="category">Kategoria:</label>
                                        <select type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <div class="form-error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price">Cena:</label>
                                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" value="{{ old('price') }}">
                                        @if($errors->has('price'))
                                            <div class="form-error">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 12px; padding-right: 12px">
                                    <label for="note" style="padding-left: 0">Opis:</label>
                                    <textarea id="note" name="note" rows="5">{{ old('note') }}</textarea>
                                </div>
                                @if($errors->has('note'))
                                    <div class="form-error">{{ $errors->first('note') }}</div>
                                @endif
                                <div class="row" style="padding-top: 20px; padding-left: 12px; padding-right: 12px">
                                    <input type="submit" id="booking-submit-button" class="form-control input-submit" value="Zapisz">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
