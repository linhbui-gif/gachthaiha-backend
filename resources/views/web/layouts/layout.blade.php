<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="icon" href="{{ asset('assets/frontend/images/logo.png') }}" type="image/x-icon"/>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>@yield('title')</title>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Plugin CSS -->
    <link href='{{ asset('assets/frontend/css/plugin.scss.css') }}' rel='stylesheet' type='text/css' media='all'/>

    <!-- Build Main CSS -->
    <link href='{{ asset('assets/frontend/css/base.scss.css') }}' rel='stylesheet' type='text/css' media='all'/>
    <link href='{{ asset('assets/frontend/css/style.scss.css') }}' rel='stylesheet' type='text/css' media='all'/>
    <link href='{{ asset('assets/frontend/css/module.scss.css') }}' rel='stylesheet' type='text/css' media='all'/>
    <link href='{{ asset('assets/frontend/css/responsive.scss.css') }}' rel='stylesheet' type='text/css' media='all'/>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css' media='all'/>
</head>
<body>
<div class="page-body">

    @include('web.elements.header')

    @yield('content')


    @include('web.elements.footer')

</div>

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
