@extends('include.shop')

@section('product')
<style>
    body {
        font-family: 'Cairo', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .product-details {
        max-width: 800px;
        margin: 40px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .product-details img {
        width: 300px;
        height: auto;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .product-details h1 {
        font-size: 24px;
        color: #343a40;
        margin-bottom: 15px;
    }

    .product-details .price {
        font-size: 20px;
        color: #f77d0e;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .product-details p {
        font-size: 16px;
        color: #555;
        line-height: 1.6;
    }

    .buy-button {
        display: inline-block;
        background-color: #f77d0e;
        color: #fff;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .buy-button:hover {
        background-color: #e66a00;
    }
</style>

<div class="product-details">
    <img id="product-image" src="{{ asset('img/products/' . $product->cate_img) }}" alt="{{ $product->name }}">
    <h1 id="product-name">{{ $product->name }}</h1>
    <div class="price" id="product-price">₪ {{ $product->price }}</div>
    <p id="product-description">{{ $product->description }}</p>
    <a href="https://api.whatsapp.com/send?phone=972593012145" rel="noopener noreferrer" target="_blank" class="buy-button">  تواصل الآن</a>
    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-warning">أضف إلى السلة</a>

</div>

<script>
    $(document).ready(function() {
        $(".btn-warning").click(function(e) {
            e.preventDefault();
            var url = $(this).attr("href");

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    $("#cart-count").text(response.cart_count); // تحديث العدد في الواجهة
                    $(".cart-count").text(response.cart_count);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
