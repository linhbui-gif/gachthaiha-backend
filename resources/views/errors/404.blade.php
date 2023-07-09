@extends('web.layouts.layout')
@section('title', 'Trang chủ')
@section('content')
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <h1 class="text-center text-uppercase">404 not found</h1>
        <p class="text-center" style="font-size: 16px;">Trang bạn tìm kiếm không tồn tại hoặc đã bị xóa. Vui lòng thử lại sau.</p>
        <div class="text-center">
            <a class="btn btn-default" href="/"><i class="fa fa-reply"></i> Quay lại trang chủ</a>
        </div>
    </div>
@endsection
