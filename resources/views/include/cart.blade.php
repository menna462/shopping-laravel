@extends('include.shop') <!-- هنا بنمدد shop.blade.php عشان ناخد نفس التصميم -->

@section('product')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h2 class="text-center mb-4">سلة التسوق</h2>
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>name</th>
                            <th>description</th>
                            <th>Price</th>
                            <th>quantity</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('img/products/' . $item->product->cate_img) }}" style="width: 70px;">
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->description }}</td>
                                <td>{{ $item->product->price }}₪</td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                        class="d-flex justify-content-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                            class="form-control text-center" style="width: 60px;">
                                        <button type="submit" class="btn btn-primary btn-sm mx-2">تحديث</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-danger">&times;</a>
                                </td>
                            </tr>
                            @php $total += $item->product->price * $item->quantity; @endphp
                        @endforeach
                        <tr>
                            <td colspan="3"><strong>الإجمالي</strong></td>
                            <td colspan="3"><strong>{{ $total }}₪</strong></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{ route('shop') }}" class="btn btn-primary">متابعة التسوق</a>


                    <a href="{{ route('cart.sendOrder') }}" class="btn btn-success">تواصل معنا لطلب الاوردر</a>


                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.add-to-cart-btn', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');

            $.ajax({
                url: '/add-to-cart',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id
                },
                success: function(response) {
                    $('.cart-count').text(response.cart_count);
                }
            });
        });
        $(document).on('click', '.remove-from-cart-btn', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');

            $.ajax({
                url: '/remove-from-cart/' + product_id,
                method: 'GET',
                success: function(response) {
                    $('.cart-count').text(response.cart_count);
                }
            });
        });
    </script>





    <style>
        .btn-center {
            margin: 0 5px;
        }

        img {
            width: 70px;
        }
    </style>
@endsection
