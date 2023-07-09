<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon"/>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
    <title>@yield('title')</title>
    <!-- Animation CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- Latest Bootstrap min CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!-- Icon Font CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/simple-line-icons.css') }}">
    <!-- - owl carousel CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/owlcarousel/css/owl.theme.css') }}owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.cs') }}s">
    <!-- Slick CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick-theme.css') }}">
    <!-- Style CSS-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">

</head>
<body>
    @include('web.elements.header')
    <main class="main_content">
    @yield('content')
    </main>
    @include('web.elements.footer')
    <a class="scrollup" href="#" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    <!-- JS here-->
    <!-- Latest jQuery-->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!-- popper min js-->
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <!-- Latest compiled and minified Bootstrap-->
    <script src="{{ asset('assets/frontend/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel min js-->
    <script src="{{ asset('assets/frontend/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- magnific-popup min js-->
    <script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>
    <!-- waypoints min js-->
    <script src="{{ asset('assets/frontend/js/waypoints.min.js') }}"></script>
    <!-- parallax js-->
    <script src="{{ asset('assets/frontend/js/parallax.js') }}"></script>
    <!-- countdown js-->
    <script src="{{ asset('assets/frontend/js/jquery.countdown.min.js') }}"></script>
    <!-- imagesloaded js-->
    <script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- isotope min js-->
    <script src="{{ asset('assets/frontend/js/isotope.min.js') }}"></script>
    <!-- jquery.dd.min js-->
    <script src="{{ asset('assets/frontend/js/jquery.dd.min.js') }}"></script>
    <!-- slick js-->
    <script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
    <!-- elevatezoom js-->
    <script src="{{ asset('assets/frontend/js/jquery.elevatezoom.js') }}"></script>
    <!-- scripts js-->
    <script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
@yield('script')

<script type="text/javascript" language="JavaScript">
    $(document).ready(function () {
        $('.brand_carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false,
                    loop: true
                },
                1000: {
                    items: 6,
                    nav: false,
                    loop: true
                }
            }
        });

        var menuPosition = $('.main-nav').position().top;
        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop();
            console.log(menuPosition + ' ' + scrollTop);
            if(scrollTop >= menuPosition){
                $('.main-nav').addClass('menu_fixed');
            }else{
                $('.main-nav').removeClass('menu_fixed');
            }
        });
    });
</script>

</body>
</html>
