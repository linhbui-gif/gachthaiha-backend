<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset('assets/frontend/images/favicon.png') }}" rel="icon"/>

    @include('admin.layouts.elements.header_script')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.elements.header')

    @include('admin.layouts.elements.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('admin.layouts.elements.footer')
</div>

@include('admin.layouts.elements.footer_script')

</body>
</html>
