@extends('web.layouts.layout')
@section('seo')
    @include('web.elements.seo',[
    'title' => $data['config']->seo_title,
    'description' => $data['config']->seo_description,
    'image' => $data['config']->image,
    'keyword' => $data['config']->seo_keyword
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
