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
                                Kategoria
                            </h2>
                        </header>
                        <div id="cart">
                            <img src="{{ URL::asset('img/menu/banners/' . $category->photo) }}" alt="{{ $category->name }}" style="max-width: 100%; margin-top: 10px">
                            <form  role="booking-form" method="POST" action="{{ route('update-category', $category) }}" enctype="multipart/form-data" style="margin-top: 10px">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="name">Nazwa:</label>
                                            <input type="text" id="name" name="name" class="form-control @error('postcode') is-invalid @enderror" value="{{ $category->name }}">
                                            @if($errors->has('name'))
                                                <div class="form-error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label for="image">Zdjecie:</label>
                                            <input type="file" id="image" name="image" class="form-control @error('postcode') is-invalid @enderror">
                                            @if($errors->has('image'))
                                                <div class="form-error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
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
