@extends("layouts.table_card")

@section('table-content')
    <header class="form-header text-center">
        <h2>
            Kategoria
        </h2>
    </header>
    <div id="cart">
        <img src="{{ URL::asset('img/menu/banners/' . $category->photo) }}" alt="{{ $category->name }}" style="max-width: 100%; margin-top: 10px">
        <form method="POST" action="{{ route('update-category', $category) }}" enctype="multipart/form-data" style="margin-top: 10px">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <label for="name">Nazwa:</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" required>
                    @if($errors->has('name'))
                        <div class="form-error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="image">Zdjecie:</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" required>
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
@endsection


