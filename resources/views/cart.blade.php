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
                        <td class="cart-table-checkbox" data-th="">
                            <button class="btn btn-secondary cart-button input-submit remove-from-cart"><i class="bi bi-trash"></i></button>
                        </td>
                        <td class="cart-table-name" data-th="product-name">
                            {{ $content[$id]['name'] }}
                        </td>
                        <td class="cart-table-quantity" data-th="product-quantity" style="min-width: 20px">
                            <input style="min-width: 20px" type="number" value="{{ $content[$id]['quantity'] }}" class="quantity update-cart" min="1" max="99">
                        </td>
                        <td class="cart-table-price" data-th="Product">
                            {{ $content[$id]['price'] }} zł
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="cart-table-sum" colspan="3">Suma:</td>
                    <td class="cart-table-price">{{ number_format($sum, 2) }} zł</td>
                </tr>
            </table>
            @if(session()->has('err'))
                <div class="form-error" style="margin-bottom: 10px">{{ session()->remove('err') }}</div>
            @endif
            <div class="row justify-content-end">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a class="btn form-control input-submit" href="{{ url('remove-all') }}">Usuń Wszystkie</a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a class="btn form-control input-submit" href="{{ route('create-order') }}">Kontynuj</a>
                </div>
            </div>

            <script>
                $(".update-cart").change(function (event) {
                    event.preventDefault();
                    var element = $(this);

                    $.ajax({
                        url: '{{ route('update-cart') }}',
                        method: "patch",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: element.parents("tr").attr("data-id"),
                            quantity: element.parents("tr").find(".quantity").val()
                        },
                        success: function (response) {
                            window.location.reload();
                        },
                        error: function (response) {
                            window.location.reload();
                        }
                    });
                });

                $(".remove-from-cart").click(function (event) {
                    event.preventDefault();
                    var element = $(this);

                    $.ajax({
                        url: '{{ route('remove-from-cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: element.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                });
            </script>
        @else
            <div class='row cart-empty'>
                <h2>W twoim koszyku nie ma żadnych produktów!</h2>
            </div>
        @endif
    </div>
@endsection


