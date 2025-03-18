@extends('include.shop')
@section('product')

@if(isset($products) && count($products) > 0)
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">منتجاتنا</h6>
                <h1 class="mb-5">تسوق بأمان من <span class="text-primary text-uppercase">منتجاتنا</span></h1>
            </div>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset('img/products/' . $product->cate_img) }}" alt="{{ $product->name }}">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">₪ {{ $product->price }}</small>
                            </div>
                            <div class="p-4 mt-2">
                                <h5 class="mb-3">{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{ route('product.show2', $product->id) }}">تفاصيل المنتج</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <p class="text-center">لا يوجد منتجات متاحة حاليًا.</p>
@endif

@endsection
