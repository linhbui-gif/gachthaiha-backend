@extends('web.layouts.layout')
@section('title', 'Trang chủ')
@section('seo')
    @include('web.elements.seo',[
    'title' => "Gạch ốp lát thái hà - Số 123 Thái Hà, Hà Nội",
    'description' => "Kho gạch ốp lát lớn nhất Việt Nam. Gạch trang trí, kiến trúc và ngói lợp mái giá rẻ tốt nhất.",
    'image' => "https://gachthaiha.hapisolution.com/assets/frontend/images/logo.png",
    'keyword' => "gạch ốp lát,gạch nhà tắm, gạch bể bơi"
    ])
@endsection
@section('content')
    @include('web.banners.slider', ['data' => $banner])
    @include('web.services.services')
    @include('web.shop.shop-product-row', ['newProduct' => $newestProduct])
    @include('web.shop.shop-product-best-seller', ['promoteProduct' => $promoteProduct])
    @include('web.banners.banner-2')
    @include('web.about.about',['categoriesProduct' => $hotProductCategory])
    @include('web.news.new-home',['hotNews' => $hotNews])
    @include('web.partners.partner')
@endsection
