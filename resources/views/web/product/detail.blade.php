@extends('web.layouts.layout')
@section('title', $product->name)
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        "Chi tiết sản phẩm",
        $product->name
    ]

    ?>
    <?php
     $galleryProduct = json_decode($product->feature_image, true);
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => $product->name])
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                            <div class="product-image">
                                <div class="product_img_box">
                                    <img id="product_img" src="{{ $galleryProduct && @$galleryProduct[0] }}" data-zoom-image="{{ $galleryProduct && @$galleryProduct[0] }}" alt="product_img1">
                                    <a class="product_img_zoom" href="#" title="Zoom">
                                        <span class="linearicons-zoom-in">
                                        </span>
                                    </a>
                                </div>
                                <div class="product_gallery_item slick_slider" id="pr_item_gallery" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                    @if(!empty($galleryProduct))
                                        @foreach($galleryProduct as $key => $url)
                                        <div class="item">
                                            <a class="product_gallery_item {{$key % 2 == 0 ? "active" : ""}}" href="#" data-image="{{ $url }}" data-zoom-image="{{$url}}">
                                                <img src="{{$url}}" alt="product_small_img1">
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pr_detail">
                                <div class="product_description">
                                    <h4 class="product_title"><a href="#">{{ $product->name }}</a></h4>
                                    <div class="product_price"><span class="price">{{ number_format($product->price) }}₫ /m2</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Danh mục sản phẩm: {{ $product->category->name ?? '' }}</p>
                                        <p>Loại gạch: {{ $product->type->name ?? '' }}</p>
                                        <p>Kích thước: {{ $product->size->name ?? '' }}</p>
                                        <p>Bề mặt gạch: {{ $product->surface->name ?? '' }}</p>
                                        <p>Thương hiệu: {{ $product->brand->name ?? '' }}</p>
                                        <p>Mã SP: {{ $product->sku ?? '' }}</p>
                                    </div>
                                    <div class="product_sort_info">
                                        <ul>
                                            <li><i class="linearicons-shield-check"></i> Vận chuyển miễn phí</li>
                                            <li><i class="linearicons-sync"></i> Cam kết chính hãng</li>
                                            <li><i class="linearicons-bag-dollar"></i> Showroom 5 tầng tại:
                                                66 Lạc Trung, Hà Nội
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <div class="quantity">
                                            <input class="minus" type="button" value="-">
                                            <input class="qty" type="text" name="quantity" value="1" title="Qty" size="4">
                                            <input class="plus" type="button" value="+">
                                        </div>
                                    </div>
                                    <div class="cart_btn mt-2">
                                        <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                    </div>
                                    <div class="cart_btn mt-2">
                                        <button class="btn btn-facebook" type="button" style="color:white"> Báo giá công trình</button>
                                    </div>
                                </div>
                                <hr>
                                <ul class="product-meta">
                                    <li>Liên hệ để có Giá ưu đãi hơn:
                                        <p><a href="#">0911 441 066  -  0981 306 450  -  024 3632 0280</a></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Mô tả</a></li>
                                    <li class="nav-item"><a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Thông tin bổ sung</a></li>
                                </ul>
                                <div class="tab-content shop_info_tab">
                                    <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                        {!! $product->detail !!}
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Capacity</td>
                                                <td>5 Kg</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Black, Brown, Red,</td>
                                            </tr>
                                            <tr>
                                                <td>Water Resistant</td>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <td>Material</td>
                                                <td>Artificial Leather</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="small_divider"></div>
                                <div class="divider"></div>
                                <div class="medium_divider"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_s1">
                                <h3>Sản phẩm tương tự</h3>
                            </div>
                            <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive="{&quot;0&quot;:{&quot;items&quot;: &quot;1&quot;}, &quot;481&quot;:{&quot;items&quot;: &quot;2&quot;}, &quot;768&quot;:{&quot;items&quot;: &quot;3&quot;}, &quot;1199&quot;:{&quot;items&quot;: &quot;4&quot;}}">
                                @if(!empty($otherProduct) && !$otherProduct->isEmpty())
                                    @foreach($otherProduct as $key => $value)
                                        <div class="item">
                                            @include('web.components.shop.shop-product-item',['data' => $value])
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            @php $recentProduct = \App\Libs\WebLib::getRecentProduct(); @endphp
                            <h5 class="widget_title">Sản Vừa xem</h5>
                            <ul class="widget_recent_post">
                                @if(!empty($recentProduct) && !$recentProduct->isEmpty())
                                    @foreach($recentProduct as $key => $value)
                                        <li>
                                            <div class="post_img"><a href="{{route('web.product.detail', ['link' => $value->link])}}"><img
                                                            src="{{$value->image}}"
                                                            alt="shop_small1"></a></div>
                                            <div class="post_content">
                                                <h6 class="product_title"><a href="{{route('web.product.detail', ['link' => $value->link])}}">{{$value->name}}</a></h6>
                                                <div class="product_price"><span class="price">{{ number_format($value->price) }}₫ /m2</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="breadcrumb_background">--}}
{{--        <div class="title_full">--}}
{{--            <div class="container a-center">--}}
{{--                <p class="title_page_breadcrumb">{{ $product->name }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <section class="bread-crumb">--}}
{{--            <span class="crumb-border"></span>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xs-12 a-left">--}}
{{--                        <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">--}}
{{--                            <li class="home">--}}
{{--                                <a itemprop="url" href="/"><span itemprop="title">Trang chủ</span></a>--}}
{{--                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a itemprop="url"--}}
{{--                                   href="{{ route('web.product.category', ['link' => ($product->category->link ?? '')]) }}">--}}
{{--                                    <span itemprop="title">{{ $product->category->name ?? '' }}</span>--}}
{{--                                </a>--}}
{{--                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>--}}
{{--                            </li>--}}
{{--                            <li><strong><span itemprop="title">{{ $product->name }}</span></strong>--}}
{{--                            <li>--}}


{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}

{{--    <section class="product" itemscope itemtype="http://schema.org/Product">--}}
{{--        <meta itemprop="url" content="{{ route('web.product.detail', ['link' => $product->link]) }}">--}}
{{--        <meta itemprop="image" content="{{ $product->image }}">--}}

{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="details-product">--}}
{{--                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                        <div class="rows row-width">--}}
{{--                            <form enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('web.product.add_to_cart') }}" method="post"--}}
{{--                                  class="row form-width">--}}
{{--                                @csrf--}}
{{--                                <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-5 col-lg-5">--}}
{{--                                    <div class="rows">--}}
{{--                                        <div class="col_large_full large-image">--}}
{{--                                            <a href="{{ $product->image }}" class="large_image_url checkurl"--}}
{{--                                               data-rel="prettyPhoto[product-gallery]">--}}
{{--                                                <img id="img_01" class="img-responsive" alt="{{ $product->name }}"--}}
{{--                                                     src="{{ $product->image }}"--}}
{{--                                                     data-zoom-image="{{ $product->image }}"/>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                        <div class="thumb_gallary">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 details-pro">--}}
{{--                                    <h1 class="title-product" itemprop="name">{{ $product->name }}</h1>--}}
{{--                                    <div class="fw" itemprop="offers" itemscope itemtype="http://schema.org/Offer">--}}
{{--                                        <div class="group-status">--}}
{{--                                            <div class="form-group" style="margin-bottom: 10px;">--}}
{{--                                                <span class="a_name">Danh mục sản phẩm:</span>--}}
{{--                                                <span class="status_name">{{ $product->category->name ?? '' }}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group" style="margin-bottom: 10px;">--}}
{{--                                                <span class="a_name">Loại gạch:</span>--}}
{{--                                                <span class="status_name">{{ $product->type->name ?? '' }}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group" style="margin-bottom: 10px;">--}}
{{--                                                <span class="a_name">Kích thước:</span>--}}
{{--                                                <span class="status_name">{{ $product->size->name ?? '' }}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group" style="margin-bottom: 10px;">--}}
{{--                                                <span class="a_name">Bề mặt gạch:</span>--}}
{{--                                                <span class="status_name">{{ $product->surface->name ?? '' }}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group" style="margin-bottom: 10px;">--}}
{{--                                                <span class="a_name">Thương hiệu:</span>--}}
{{--                                                <span class="status_name">{{ $product->brand->name ?? '' }}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group" style="margin-bottom: 10px;">--}}
{{--                                                <span class="a_name">Mã SP:</span>--}}
{{--                                                <span class="status_name">{{ $product->sku ?? '' }}</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="price-box">--}}
{{--                                            <div class="special-price">--}}
{{--                                                <span class="price product-price">--}}
{{--                                                    <span>Giá bán:</span>{{ number_format($product->price) }}₫--}}
{{--                                                </span>--}}
{{--                                                <meta itemprop="price" content="{{ $product->price }}₫">--}}
{{--                                                <meta itemprop="priceCurrency" content="VND">--}}
{{--                                            </div> <!-- Giá -->--}}

{{--                                        </div>--}}
{{--                                        <div class="product-summary product_description">--}}
{{--                                            <div class="rte description text3line">--}}
{{--                                                {!! $product->description !!}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-product col-sm-12 col-lg-12 col-md-12 col-xs-12">--}}
{{--                                            <div class="form-group form_button_details ">--}}
{{--                                                <div class="boxinput">--}}
{{--                                                    <header class="not_bg">Số lượng:</header>--}}
{{--                                                    <div--}}
{{--                                                        class="custom input_number_product custom-btn-number form-control">--}}
{{--                                                        <button class="btn_num num_2 button button_qty"--}}
{{--                                                                onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"--}}
{{--                                                                type="button">+--}}
{{--                                                        </button>--}}
{{--                                                        <button class="btn_num num_1 button button_qty"--}}
{{--                                                                onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"--}}
{{--                                                                type="button">---}}
{{--                                                        </button>--}}
{{--                                                        <input type="hidden" name="product_id" value="{{ $product->id }}" />--}}
{{--                                                        <input type="number" id="qtym" name="quantity" value="1" class="form-control prd_quantity">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <button type="submit"--}}
{{--                                                        class="btn btn-lg  btn-cart button_cart_buy_enable add_to_cart btn_buy btn-cart2">--}}
{{--                                                    <span>Thêm vào giỏ hàng</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <!-- Endtab -->--}}
{{--                        <!-- Tab -->--}}
{{--                        <div class="tab_width_full">--}}
{{--                            <div class="row xs-margin-top-15">--}}
{{--                                <div id="tab_ord" class="col-xs-12 col-sm-12 col-lg-9 col-md-9">--}}
{{--                                    <!-- Nav tabs -->--}}
{{--                                    <div class="product-tab e-tabs not-dqtab">--}}
{{--                                        <span class="border-dashed-tab"></span>--}}
{{--                                        <ul class="tabs tabs-title clearfix">--}}
{{--                                            <li class="tab-link current" data-tab="tab-1">--}}
{{--                                                <h3><span>Thông tin sản phẩm</span></h3>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="tab-float woocommerce">--}}
{{--                                            <div id="tab-1" class="tab-content content_extab current">--}}
{{--                                                <div class="rte">--}}
{{--                                                    {!! $product->detail !!}--}}
{{--                                                </div>--}}

{{--                                                <hr/>--}}

{{--                                                <div class="col-sm-12">--}}
{{--                                                    <div class="product_review">--}}
{{--                                                        @include('web.product.element.product_review')--}}
{{--                                                    </div>--}}

{{--                                                    <div class="product_comment">--}}
{{--                                                        @include('web.product.element.product_comment')--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3">--}}

{{--                                    <div class="product_sidebar_box">--}}
{{--                                        <div class="product_sidebar_box_title">--}}
{{--                                            Cùng thương hiệu--}}
{{--                                        </div>--}}
{{--                                        <div class="product_sidebar_box_content">--}}
{{--                                            @if(!empty($sameBrand) && !$sameBrand->isEmpty())--}}
{{--                                                @foreach($sameBrand as $key => $value)--}}
{{--                                                    <div class="item_product_main">--}}
{{--                                                        @include('web.product.single_product', ['value' => $value])--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="product_sidebar_box">--}}
{{--                                        <div class="product_sidebar_box_title">--}}
{{--                                            Cùng loại bề mặt--}}
{{--                                        </div>--}}
{{--                                        <div class="product_sidebar_box_content">--}}
{{--                                            @if(!empty($sameSurface) && !$sameSurface->isEmpty())--}}
{{--                                                @foreach($sameSurface as $key => $value)--}}
{{--                                                    <div class="item_product_main">--}}
{{--                                                        @include('web.product.single_product', ['value' => $value])--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="product_sidebar_box">--}}
{{--                                        <div class="product_sidebar_box_title">--}}
{{--                                            Sản phẩm vừa xem--}}
{{--                                        </div>--}}
{{--                                        <div class="product_sidebar_box_content">--}}
{{--                                            @php $recentProduct = \App\Libs\WebLib::getRecentProduct(); @endphp--}}
{{--                                            @if(!empty($recentProduct) && !$recentProduct->isEmpty())--}}
{{--                                                @foreach($recentProduct as $key => $value)--}}
{{--                                                    <div class="item_product_main">--}}
{{--                                                        @include('web.product.single_product', ['value' => $value])--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_sidebar_box">--}}
{{--                                        <div class="product_sidebar_box_title">--}}
{{--                                            Sản phẩm vừa xem--}}
{{--                                        </div>--}}
{{--                                        <div class="product_sidebar_box_content">--}}
{{--                                            @php $recentProduct = \App\Libs\WebLib::getRecentProduct(); @endphp--}}
{{--                                            @if(!empty($recentProduct) && !$recentProduct->isEmpty())--}}
{{--                                                @foreach($recentProduct as $key => $value)--}}
{{--                                                    <div class="item_product_main">--}}
{{--                                                        @include('web.product.single_product', ['value' => $value])--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                        <div class="related_module f-width margin-bottom-30">--}}
{{--                            <div class="title_module_main a-left">--}}
{{--                                <h2>--}}
{{--                                    <a href="{{ route('web.product.category', ['link' => ($product->category->link ?? '')]) }}"--}}
{{--                                       title="Sản phẩm tương tự">--}}
{{--                                        <span><span>Sản phẩm tương tự</span></span>--}}
{{--                                    </a>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div class="wrap_owl">--}}
{{--                                <div class="owl-carousel owl-related"--}}
{{--                                     data-nav="true"--}}
{{--                                     data-dot="true"--}}
{{--                                     data-lg-items="4"--}}
{{--                                     data-md-items="4"--}}
{{--                                     data-height="true"--}}
{{--                                     data-xs-items="1"--}}
{{--                                     data-sm-items="3"--}}
{{--                                     data-margin="15">--}}
{{--                                    @if(!empty($otherProduct) && !$otherProduct->isEmpty())--}}
{{--                                        @foreach($otherProduct as $key => $value)--}}
{{--                                            <div class="item_product_main">--}}
{{--                                                @include('web.product.single_product', ['value' => $value])--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}
@endsection

@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('#add-to-cart-form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        if(res.success){
                            $('.cartCount').text(res.number_product);
                            alert('Thêm sản phẩm vào giỏ hàng thành công');
                        }else{
                            alert(res.message);
                        }
                    },
                    error: function(){
                        alert('Có lỗi trong quá trình thêm sản phẩm vào giỏ hàng. Mời bạn thử lại');
                    }
                });
            });
        });
    </script>
@endsection
