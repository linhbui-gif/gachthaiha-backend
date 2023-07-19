@extends('web.layouts.layout')
@section('title', 'Trang chủ')
@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>404 Not Found</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">404</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <div class="section">
        <div class="error_wrap">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10 order-lg-first">
                        <div class="text-center">
                            <div class="error_txt">404</div>
                            <h5 class="mb-2 mb-sm-3">oops! Trang bạn tìm kiếm không tồn tại hoặc đã bị xóa. Vui lòng thử lại sau!</h5>
                            <p>Trang bạn đang tìm kiếm đã bị di chuyển, xóa, đổi tên hoặc có thể chưa từng tồn tại.</p>
                            <a href="/" class="btn btn-fill-out">Quay lại trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
