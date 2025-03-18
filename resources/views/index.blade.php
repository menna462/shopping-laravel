<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>seaf Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link href={{ asset('frontend/lib/animate/animate.min.css')}} rel="stylesheet">
    <link href={{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}} rel="stylesheet">
    <link href={{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}} rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{ asset('frontend/css/bootstrap.min.css')}} rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href= {{ asset('frontend/css/style.css')}} rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html"
                        class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Queen Store</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">seaf@example.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0"><a href="https://api.whatsapp.com/send?phone=972593012145"
                                        rel="noopener noreferrer" target="_blank">00972593012145</a></p>
                            </div>
                        </div>

                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Queen Store</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href={{ route('home') }} class="nav-item nav-link active">الرئيسية</a>
                                <a href={{route('about')}} class="nav-item nav-link">من نحن</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">خدماتنا</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">المنتجات</a>
                                        <a href="" class="dropdown-item">بودكاست</a>
                                    </div>
                                </div>
                                <a href="https://api.whatsapp.com/send?phone=972593012145" class="nav-item nav-link" target="_blank">اتصل بنا</a>
                                <a>
                                    @if (Route::has('login'))
                                    @auth
                                    <a href="{{ route('cart') }}" class="nav-item nav-link icon">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="cart-count">{{ session('cart_count', 0) }}</span>
                                    </a>
                                    <p class="rank"> الرتبة:{{ auth()->user()->rank ?? 'غير محدد' }}</p>

                                        <form method="POST" action="{{ route('logout') }}" class="inline">
                                            @csrf
                                            <input type="submit" value="logout" class="logout">
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="login">
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                               class="register">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                @endif

                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->
        <style>
            .login ,.register{
                color: #fff;margin: auto; padding: 19px;font-size: 20px;
                border: 1px solid #FEA116;
                padding: 5px !important;
                margin-right: 20px
            }
            .icon{
                color: #fff;
                font-size: 20px;
                margin-left: 10px
            }
            .logout{
                border: 1px solid #FEA116;
                padding: 5px !important;
                margin-right: 20px;
                margin-top: 15px;
                color:#fff;
                background-color:#FEA116;
            }
            .rank{
                border: 1px solid #FEA116;
                padding: 6px !important;
                margin: auto;
                color:#fff;
                background-color:#FEA116;
                border-radius: 5px;
            }
        </style>

        <main>
            @yield('content')
        </main>
          <!-- Footer Start -->
          <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s"
          style="overflow: hidden;">
          <div class="container pb-5">
              <div class="row g-5">

                  <div class="col-md-6 col-lg-4">
                      <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                      <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> قضاء قلقيلية /جيوس .</p>
                      <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> <a
                              href="https://api.whatsapp.com/send?phone=972593012145" rel="noopener noreferrer"
                              target="_blank">00972593012145</a></p>
                      <p class="mb-2"><i class="fa fa-envelope me-3"></i> <a
                              href="mailto:queenstorehandmadeprodact@gmail.com">queenstorehandmadeprodact@gmail.com</a>
                      </p>
                  </div>

              </div>
          </div>
          <div class="container">
              <div class="copyright">
                  <div class="row">
                      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                          &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                          Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                          <br>Distributed By: <a class="border-bottom" href="https://themewagon.com"
                              target="_blank">ThemeWagon</a>
                      </div>
                      <div class="col-md-6 text-center text-md-end">
                          <div class="footer-menu">
                              <a href="">Home</a>
                              <a href="">Cookies</a>
                              <a href="">Help</a>
                              <a href="">FQAs</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Footer End -->
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




function updateCartCount() {
    $.ajax({
        url: '/cart-count',
        method: 'GET',
        success: function(response) {
            $('.cart-count').text(response.cart_count);
        }
    });
}

// تحديث العدد عند إضافة منتج
$(document).on('click', '.add-to-cart-btn', function(e) {
    e.preventDefault();
    let product_id = $(this).data('id');

    $.ajax({
        url: '/add-to-cart/' + product_id,
        method: 'GET',
        success: function(response) {
            updateCartCount(); // تحديث العدد بعد الإضافة
        }
    });
});

// تحديث العدد عند إزالة منتج
$(document).on('click', '.remove-from-cart-btn', function(e) {
    e.preventDefault();
    let product_id = $(this).data('id');

    $.ajax({
        url: '/remove-from-cart/' + product_id,
        method: 'GET',
        success: function(response) {
            updateCartCount(); // تحديث العدد بعد الحذف
        }
    });
});

// تحديث العدد عند تحميل الصفحة
$(document).ready(function() {
    updateCartCount();
});

    </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{ asset('frontend/lib/wow/wow.min.js')}}></script>
    <script src={{ asset('frontend/lib/easing/easing.min.js')}}></script>
    <script src={{ asset('frontend/lib/waypoints/waypoints.min.js')}}></script>
    <script src={{ asset('frontend/lib/counterup/counterup.min.js')}}></script>
    <script src={{ asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}></script>
    <script src={{ asset('frontend/lib/tempusdominus/js/moment.min.js')}}></script>
    <script src={{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js')}}></script>
    <script src={{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}></script>

    <!-- Template Javascript -->
    <script src={{ asset('frontend/js/main.js')}}></script>
</body>

</html>
