@extends('index')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100"
                        src="https://img.freepik.com/free-photo/best-friends-being-happy-after-shopping-spree_23-2148650459.jpg?t=st=1723037681~exp=1723041281~hmac=b47261d27b606a5914a6defb43c9581f2427fdaa07bed480623d8ce501170253&w=996"
                        alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">كوني
                                متألقة دائما</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">كوني ملكة مع متجر Queen Store
                            </h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">عضوية
                                جديدة</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">الحصول على
                                النقاط</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100"
                        src="https://img.freepik.com/free-photo/collection-cosmetic-beauty-products-white-backdrop_23-2147878830.jpg?t=st=1723037752~exp=1723041352~hmac=3d77ed5f8355283bba0350ff6f1d1d10dfcd5a9b28723105bfed9e2a1dde5e63&w=996"
                        alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">منتجات
                                العناية بمكان واحد</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">يوفر لك متجر Queen Store جميع
                                منتجات العناية</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">منتجاتنا</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">الاقسام
                                الرىيسية</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">منتجاتنــا</h6>
                <h1 class="mb-5">تسوق بأمان من <span class="text-primary text-uppercase">منتجاتنا</span></h1>
            </div>
            <div class="row g-4">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{ asset('img/products/' . $product->cate_img) }}"
                                        alt="{{ $product->name }}">
                                    <small
                                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                        ₪ {{ $product->price }}
                                    </small>
                                </div>
                                <div class="p-4 mt-2">
                                    <h5 class="mb-3">{{ $product->name }}</h5>
                                    <p>{{ $product->description }}</p>
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                        href="{{ route('product.show2', ['id' => $product->id]) }}">
                                        تفاصيل المنتج
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">لا توجد منتجات متاحة حالياً</p>
                @endif
            </div>

        </div>
    </div>

    <!-- About End -->
    <!-- Room Start -->
    <div class="text-center mt-5">
        <a href={{ route('shop') }} class="btn btn-primary">عرض المزيد</a>
    </div>
    <!-- Room End -->
    <div class="container rock-box">
        <p class="one-p">نظام الترقية</p>
        <div class="row">
            <div class="col-md-4 ">
                <div class="box" >
                    <div class="rank-badge">1</div>
                    <h2 class="title-one">سفيرة</h2>
                    <h5 class="title-two">نقطه 1000</h5>
                </div>
                <p class="two-p">هديه+خصم 1 شيكل</p>
            </div>
            <div class="col-md-4">
                <div class="box" style="margin-top: 40px">
                    <h2 class="title-one">أميرة</h2>
                    <h5 class="title-two">نقطه 2000</h5>
                    <div class="rank-badgetow">2</div>
                </div>
                <p class="two-p">هديه+خصم 2 شيكل</p>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="rank-badge">3</div>
                    <h2 class="title-one">ملكة</h2>
                    <h5 class="title-two">نقطه 3000</h5>
                </div>
                <p class="two-p">هديه+خصم 3 شيكل</p>
            </div>
        </div>

    </div>
    <!-- Video Start -->
    <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6 bg-dark d-flex align-items-center">
                <div class="p-5">
                    <h6 class="section-title text-start text-white text-uppercase mb-3">كوني ملكة مع متجرنا</h6>
                    <h1 class="text-white mb-4">قسم البودكاست والتسجيلات</h1>
                    <p class="text-white mb-4">
                        المدربة المعتمدة سليمة عبدالهادي شماسنة تقدم دورات في مجال تطوير الذات .
                        مدربة معتمدة مستوى ثاني / فلسطين / جلوبال كندا سنتر .
                    </p>
                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">معرفة المزيد</a>
                    <a href="" class="btn btn-light py-md-3 px-md-5">اشترك الان</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video">
                    <button type="button" class="btn-play" data-bs-toggle="modal" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="" allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const videoModal = document.getElementById("videoModal");
            const videoFrame = document.getElementById("videoFrame");
            const closeButton = document.querySelector(".btn-close");

            // Stop the video when the modal is closed
            closeButton.addEventListener("click", function() {
                videoFrame.setAttribute("src",
                    "{{ asset('frontend/img/VID-20250212-WA0053.mp4') }}"
                    ); // Reset the src to stop the video
            });

            // Reset the video source when the modal is closed (optional, for other closing methods)
            videoModal.addEventListener("hidden.bs.modal", function() {
                videoFrame.setAttribute("src",
                    "{{ asset('frontend/img/VID-20250212-WA0053.mp4') }}"
                    ); // Reset the src to stop the video
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const playButton = document.querySelector(".btn-play");
            const videoModal = document.getElementById("videoModal");
            const videoFrame = document.getElementById("videoFrame");

            // Set the video source when the Play Button is clicked
            playButton.addEventListener("click", function() {
                videoFrame.setAttribute("src",
                    "{{ asset('frontend/img/VID-20250212-WA0053.mp4') }}"); // Set the video source
            });

            // Stop the video when the modal is closed
            videoModal.addEventListener("hidden.bs.modal", function() {
                videoFrame.setAttribute("src",
                    "{{ asset('frontend/img/VID-20250212-WA0053.mp4') }}"
                    ); // Reset the src to stop the video
            });
        });
    </script>
    <!-- Video Start -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">منتجــاتنا</h6>
                <h1 class="mb-5">اكتشفي سر نجاح <span class="text-primary text-uppercase">منتجاتنا</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item rounded" href="">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-hotel fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">فريق تخصصي طبي</h5>
                        <p class="text-body mb-0">نضمن لكي الامان في حال قمتي باستخدام احد منتجاتنا وذلك لوجود فريق
                            طبي متخصص.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <a class="service-item rounded" href="">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">جودة تصنيع عالية</h5>
                        <p class="text-body mb-0">يتم تصنيع جميع المنتجات باستخدام احدث الاجهزة الطبية لضمان الجودة.
                        </p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item rounded" href="">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-spa fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">تواصل دائم</h5>
                        <p class="text-body mb-0">يمكنك بأي وقت التواصل مع فريق الدعم طيلة ايام الاسبوع وستتلقين ردا
                            بأسرع وقت</p>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- address Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">نقاط استلام مجانيه</h6>
                <h1 class="mb-5">تعرف عل نقاط الاستلام المجانيه <span class="text-primary text-uppercase">Queen
                        Store</span></h1>
            </div>
            <div class="row g-4">
                @if (!isset($locations) || $locations->isEmpty())
                    <p>⚠ لا توجد مواقع متاحة.</p>
                @endif
                @foreach ($locations as $location)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden address">
                            <div class="">
                                <img class="img-fluid w-100" src="{{ asset('img/location/' . $location->loc_img) }}"
                                    alt="">
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h6 class="fw-bold mb-0">{{ $location->description }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- address End -->


    <!-- Testimonial End -->






    <br><br><br><br><br><br><br><br>


@endsection
