@extends('web.layouts.layout')
@section('title', $news->name)
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        "Chi tiết tin tức",
        $news->name
    ]
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => $news->name])
@endsection