<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>Queen Store</title>
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{ asset('frontend/lib/animate/animate.min.css') }} rel="stylesheet">
    <link href={{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">
    <link href={{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }} rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{ asset('frontend/css/bootstrap.min.css') }} rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href={{ asset('frontend/css/style.css') }} rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
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
                                <a href="products.html" class="nav-item nav-link">منتجاتنا</a>
                                <a href="{{ route('cart') }}" class="nav-item nav-link icon">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="cart-count">{{ session('cart_count', 0) }}</span>
                                </a>

                                <a href="https://api.whatsapp.com/send?phone=972593012145"
                                    class="nav-item nav-link">اتصل بنا</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <main>
            @yield('product')
        </main>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer mt-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <h5 class="text-white">Queen Store</h5>
                        <p>أفضل متجر لتقديم المنتجات الصحية والطبيعية.</p>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="text-white">تواصل معنا</h5>
                        <p><i class="fa fa-envelope"></i> queenstore@example.com</p>
                        <p><i class="fa fa-phone"></i> +012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{ asset('frontend/lib/wow/wow.min.js') }}></script>
    <script src={{ asset('frontend/lib/easing/easing.min.js') }}></script>
    <script src={{ asset('frontend/lib/counterup/counterup.min.js') }}></script>

    <!-- Template Javascript -->
    <script src={{ asset('frontend/js/main.js') }}></script>
</body>

</html>
