<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="icon" href="{{ $data['config']->favicon }}" type="image/x-icon"/>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @hasSection('title') @yield('title') @else  @yield('seo') @endif
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
    <link rel="stylesheet" href="{{ asset('assets/frontend/owlcarousel/css/owl.theme.css') }}">
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
<!-- LOADER-->
<!--.preloader-->
<div class="spinner">
    <div class="loader-div">
  <span class="loader">
    <span></span>
    <span></span>
  </span>
    </div>
</div>
<style>
.spinner{
    display: none;
    width: 100%;
}
    .loader-div {
        position: fixed;
        top: 0;
        left: 0;
        background-color: #0000006e;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 999999;
    }

    .loader {
        position: relative;
        width: 10vw;
        height: 5vw;
        padding: 1.5vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loader span {
        position: absolute;
        height: 0.8vw;
        width: 0.8vw;
        border-radius: 50%;
        background-color: #ff0;
    }

    .loader span:nth-child(1) {
        animation: loading-dotsA 0.5s infinite linear;
    }

    .loader span:nth-child(2) {
        animation: loading-dotsB 0.5s infinite linear;
    }

    @keyframes loading-dotsA {
        0% {
            transform: none;
        }
        25% {
            transform: translateX(2vw);
        }
        50% {
            transform: none;
        }
        75% {
            transform: translateY(2vw);
        }
        100% {
            transform: none;
        }
    }

    @keyframes loading-dotsB {
        0% {
            transform: none;
        }
        25% {
            transform: translateX(-2vw);
        }
        50% {
            transform: none;
        }
        75% {
            transform: translateY(-2vw);
        }
        100% {
            transform: none;
        }
    }

</style>
<!-- END LOADER-->
    @include('web.elements.header')
    <main class="main_content">
    @yield('content')
    </main>
    @include('web.elements.footer')
    @include('sweetalert::alert')
    @if (session('success'))
        <script>
            swal({
                title: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            swal({
                title: "{{ session('error') }}",
                icon: "error",
            });
        </script>
    @endif
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
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <!-- scripts js-->
    <script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
@yield('script')

</body>
</html>
