@extends('web.layouts.layout')
@section('title', 'Trang chủ')
@section('content')
    <section class="awe-section-1">
        <section class="section_slide">
            <div class="home-slider owl-carousel" data-dot="false" data-nav='true' data-loop='true' data-play='true'
                 data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
                @if (!empty($banner))
                    @php $bannerDetail = $banner->detail; @endphp
                    @if (!empty($bannerDetail))
                        @foreach($bannerDetail as $key => $value)
                            @php $bannerImage = $value->image; @endphp
                            <div class="item">
                                <a href="{{ $value->link }}" class="clearfix">
                                    <img src="{{ $bannerImage }}" alt="{{ $value->title }}">
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div><!-- /.products -->
        </section>
    </section>

    <section class="awe-section-2">
        <section class="section_chinhsach">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="owl-carousel owl-chinhsach" data-dot="false" data-nav='false' data-loop='false'
                             data-play='false' data-lg-items='3' data-md-items='3' data-sm-items='2' data-xs-items="1"
                             data-margin='15'>
                            <div class="items">
                                <div class="imgs">
                                    <img src="{{ asset('assets/frontend/images/chinhsach1.png') }}"
                                         data-lazyload="{{ asset('assets/frontend/images/chinhsach1.png') }}"
                                         alt="chinh sach"/></div>
                                <div class="content">
                                    <p>Uy tín, chất lượng hàng đầu</p>
                                    <span>Kinh nghiệm trên 10 năm bán hàng, được bầu chọn cửa hàng uy tín nhất hiện nay.</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="imgs"><img
                                        src="{{ asset('assets/frontend/images/chinhsach2.png') }}"
                                        data-lazyload="{{ asset('assets/frontend/images/chinhsach2.png') }}"
                                        alt="chinh sach"/></div>
                                <div class="content">
                                    <p>Miễn phí vận chuyển</p>
                                    <span>Khu vực Hà Nội và vùng lân cận. Có vận chuyển COD toàn quốc.</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="imgs"><img
                                        src="{{ asset('assets/frontend/images/chinhsach3.png') }}"
                                        data-lazyload="{{ asset('assets/frontend/images/chinhsach3.png') }}"
                                        alt="chinh sach"/></div>
                                <div class="content">
                                    <p>Sản phẩm đa dạng</p>
                                    <span>Trên 2.000 mẫu gạch của hơn 30 hãng sản xuất.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <?php //* ?>
    <section class="awe-section-3">
        <section class="section_sanphamthucte">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="title_module_main">
                            <h2>
                                <a href="#" title="Sản phẩm nổi bật">
                                    <span>Sản phẩm<span> mới</span></span>
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wrap_product_module responsive product_check_hover">
                            <div class="row row-guter">
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <div class="wrap_content">
                                        <div class="owl_col_section owl-carousel" data-dot="false" data-nav="true"
                                             data-lg-items="5" data-md-items="2" data-height="true" data-xs-items="1"
                                             data-sm-items="2" data-margin="15">
                                            @if(!empty($newestProduct) && !$newestProduct->isEmpty())
                                                @php $newestProduct = array_chunk($newestProduct->toArray(), 2); @endphp
                                                @foreach($newestProduct as $key => $product)
                                                    <div class="item_product_main itemcustome">
                                                    @foreach($product as $key => $value)
                                                        @include('web.product.single_product', ['value' => json_decode(json_encode($value))])
                                                    @endforeach
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <?php //*/ ?>

    <section class="awe-section-4">
        <section class="section_danhmucnoibat">
            <div class="container">
                <div class="row">
                    <div class="wrap_category_index col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="owl_cate_ owl-carousel" data-nav="true" data-lg-items="3" data-md-items="3"
                             data-height="true" data-xs-items="1" data-sm-items="2" data-margin="15">
                            @if(!empty($hotProductCategory))
                                @foreach($hotProductCategory as $key => $value)
                                    <div class="cate_item">
                                        <div class="thumb_ img1">
                                            <a class="thumb_s"
                                               href="{{ route('web.product.category', ['link' => $value->link]) }}"
                                               title="{{ $value->name }}">

                                                <img src="{{ $value->image }}" data-lazyload="{{ $value->image }}"
                                                     alt="{{ $value->name }}"/>

                                            </a>
                                            <h4 class="title_cate_ ">
                                                <a href="{{ route('web.product.category', ['link' => $value->link]) }}"
                                                   title="{{ $value->name }}">{{ $value->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="awe-section-5">


        <section class="section_sanpham_danhgia ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="title_module_main">
                                    <h2>
                                        <a href="onsale" title="Sản phẩm Khuyến mãi">
                                            <span>Sản phẩm<span> Khuyến mãi</span></span>
                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_get_height">
                                <div class="wrap_content">
                                    <div class="owl_col_section owl-carousel product_check_hover" data-dot="false"
                                         data-nav="true" data-lg-items="2" data-md-items="2" data-height="true"
                                         data-xs-items="1" data-sm-items="2" data-margin="15">
                                        @if(!empty($promoteProduct) && !$promoteProduct->isEmpty())
                                            @php $promoteProduct = array_chunk($promoteProduct->toArray(), 2); @endphp
                                            @foreach($promoteProduct as $key => $product)
                                                <div class="item_product_main">
                                                    @foreach($product as $key => $value)
                                                        @include('web.product.single_product', ['value' => json_decode(json_encode($value))])
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="title_module_main">
                                    <h2>
                                        <span>Góc<span> trải nghiệm</span></span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="wrap_danhgia">
                                    <div class="testimonial  owl-carousel owl-theme" data-play="true" data-height="true"
                                         data-loop="true" data-dot="true" data-lg-items="1" data-md-items="1"
                                         data-sm-items="1" data-xs-items="1" data-margin="0">
                                        <?php $customerReview = \App\Libs\WebLib::getCustomerReview(); ?>
                                        @if(!empty($customerReview))
                                            @foreach($customerReview as $key => $value)
                                                <div class="testimonial-item a-center">
                                                    <div class='margin-top-15 relative comment'>
                                                        <p>{{ $value->content }}</p>
                                                    </div>
                                                    <div class="offset-top-20">
                                                        <div class="image">
                                                            <div class="fix-line inline-block">
                                                                <div class="fix-line2 inline-block">
                                                                    <img
                                                                        style="width: 60px; height: 60px; object-fit: cover;"
                                                                        alt="{{ $value->customer_name }}"
                                                                        src="{{ $value->image }}"
                                                                        data-lazyload="{{ $value->image }}"
                                                                        class="img-circle inline-block">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <label class="text-normal">{{ $value->customer_name }} -
                                                                <span>{{ $value->position.' '.$value->company }}</span></label>
                                                        </p>
                                                    </div>
                                                    <div class="star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="awe-section-6">
        <section class="section_banner">
            <div class="container">
                <a class="a_banner img1" href="{{ route('web.news.index') }}" title="Chương trình khuyến mãi">
                    <img class="img1" src="{{ asset('assets/frontend/images/banner_promotion.png') }} }}"
                         data-lazyload="{{ asset('assets/frontend/images/banner_promotion.png') }}"
                         alt="Chương trình khuyến mãi"/>
                </a>
            </div>
        </section>
    </section>

    <section class="awe-section-8">
        <section class="section_vatlieutrangtri">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="title_module_main">
                            <h2>
                                <a href="#" title="Sản phẩm nổi bật">
                                    <span>Sản phẩm <span> nổi bật</span></span>
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div class="wrap_owl wrap_owl_vatlieutrangtri">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="owl-carousel owl-muagi"
                                 data-nav="true"
                                 data-dot="true"
                                 data-lg-items="4"
                                 data-md-items="4"
                                 data-height="true"
                                 data-xs-items="1"
                                 data-sm-items="2"
                                 data-margin="15">
                                @if(!empty($hotProduct) && !$hotProduct->isEmpty())
                                    @foreach($hotProduct as $key => $value)
                                        <div class="item_product_main">
                                            @include('web.product.single_product', ['value' => $value])
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="awe-section-9">
        <section class="section_blogs margin-bottom-20">
            <div class="container">
                <div class="title_module_main a-left">
                    <h2>
                        <a href="{{ route('web.news.index') }}"
                           title="Tin tức mới nhất"><span><span>Tin tức mới nhất</span></span></a>
                    </h2>
                </div>

                <div class="list-blogs-link">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                            <a href="{{ route('web.news.index') }}" class="img1 block" title="Tin tức">
                                <img src="{{ asset('assets/frontend/images/news_banner.png') }}"
                                     data-lazyload="{{ asset('assets/frontend/images/news_banner.png') }}"
                                     alt="Tin tức"/>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            @if(!empty($hotNews))
                                <div class="owl-carousel owl-blog-index"
                                     data-nav="false"
                                     data-dot="true"
                                     data-lg-items="2"
                                     data-md-items="2"
                                     data-height="false"
                                     data-xs-items="1"
                                     data-sm-items="2"
                                     data-margin="30">
                                    @foreach($hotNews as $key => $value)
                                        @php
                                            $href = route('web.news.detail', ['link' => $value->link]);
                                        @endphp
                                        <div class="item_wrap_blog">
                                            <div class="item-blg blog-large">
                                                <div class="blog-inner">
                                                    <div class="blog-img">
                                                        <a href="{{ $href }}">
                                                            <img src="{{ $value->image }}"
                                                                 data-lazyload="{{ $value->image }}"
                                                                 style="max-width:100%;" class="img-responsive"
                                                                 alt="{{ $value->name }}">
                                                        </a>
                                                        <div class="content__">
                                                            <h3>
                                                                <a class="text2line"
                                                                   title="{{ $value->name }}"
                                                                   href="{{ $href }}">{{ $value->name }}</a>
                                                            </h3>

                                                            <span class="time_post f">
                                                        <i class="fa fa-calendar"></i>&nbsp; {{ date('d/m/Y', strtotime($value->created_at)) }}
                                                    </span>
                                                            <span class="time_post">
                                                        <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;(0) Bình luận
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            @if(!empty($listNews))
                                <div class="wrap_list_blog">
                                    <div class="row">
                                        @foreach($listNews as $key => $value)
                                            @php
                                                $href = route('web.news.detail', ['link' => $value->link]);
                                            @endphp
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="blog-item blog-item-list">
                                                    <div class="blog-item-thumbnail img1">
                                                        <a href="{{ $href }}">
                                                            <img
                                                                src="{{ $value->image }}"
                                                                data-lazyload="{{ $value->image }}"
                                                                style="max-width:100%;" class="img-responsive"
                                                                alt="{{ $value->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="ct_list_item">
                                                        <h3 class="blog-item-name">
                                                            <a href="{{ $href }}"
                                                               title="{{ $value->name }}">
                                                                {{ $value->name }}
                                                            </a>
                                                        </h3>
                                                        <span class="time_post f">
                                                        <i class="fa fa-calendar"></i>&nbsp;{{ date('d/m/Y', strtotime($value->created_at)) }}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
