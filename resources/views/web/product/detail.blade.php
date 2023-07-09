@extends('web.layouts.layout')
@section('title', $product->name)
@section('content')

    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">{{ $product->name }}</p>
            </div>
        </div>
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 a-left">
                        <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                            <li class="home">
                                <a itemprop="url" href="/"><span itemprop="title">Trang chủ</span></a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>
                            <li>
                                <a itemprop="url"
                                   href="{{ route('web.product.category', ['link' => ($product->category->link ?? '')]) }}">
                                    <span itemprop="title">{{ $product->category->name ?? '' }}</span>
                                </a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>
                            <li><strong><span itemprop="title">{{ $product->name }}</span></strong>
                            <li>


                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="product" itemscope itemtype="http://schema.org/Product">
        <meta itemprop="url" content="{{ route('web.product.detail', ['link' => $product->link]) }}">
        <meta itemprop="image" content="{{ $product->image }}">

        <div class="container">
            <div class="row">
                <div class="details-product">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="rows row-width">
                            <form enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('web.product.add_to_cart') }}" method="post"
                                  class="row form-width">
                                @csrf
                                <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-5 col-lg-5">
                                    <div class="rows">
                                        <div class="col_large_full large-image">
                                            <a href="{{ $product->image }}" class="large_image_url checkurl"
                                               data-rel="prettyPhoto[product-gallery]">
                                                <img id="img_01" class="img-responsive" alt="{{ $product->name }}"
                                                     src="{{ $product->image }}"
                                                     data-zoom-image="{{ $product->image }}"/>
                                            </a>
                                        </div>
                                        <div class="thumb_gallary">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 details-pro">
                                    <h1 class="title-product" itemprop="name">{{ $product->name }}</h1>
                                    <div class="fw" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <div class="group-status">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <span class="a_name">Danh mục sản phẩm:</span>
                                                <span class="status_name">{{ $product->category->name ?? '' }}</span>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <span class="a_name">Loại gạch:</span>
                                                <span class="status_name">{{ $product->type->name ?? '' }}</span>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <span class="a_name">Kích thước:</span>
                                                <span class="status_name">{{ $product->size->name ?? '' }}</span>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <span class="a_name">Bề mặt gạch:</span>
                                                <span class="status_name">{{ $product->surface->name ?? '' }}</span>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <span class="a_name">Thương hiệu:</span>
                                                <span class="status_name">{{ $product->brand->name ?? '' }}</span>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <span class="a_name">Mã SP:</span>
                                                <span class="status_name">{{ $product->sku ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <div class="special-price">
                                                <span class="price product-price">
                                                    <span>Giá bán:</span>{{ number_format($product->price) }}₫
                                                </span>
                                                <meta itemprop="price" content="{{ $product->price }}₫">
                                                <meta itemprop="priceCurrency" content="VND">
                                            </div> <!-- Giá -->

                                        </div>
                                        <div class="product-summary product_description">
                                            <div class="rte description text3line">
                                                {!! $product->description !!}
                                            </div>
                                        </div>
                                        <div class="form-product col-sm-12 col-lg-12 col-md-12 col-xs-12">
                                            <div class="form-group form_button_details ">
                                                <div class="boxinput">
                                                    <header class="not_bg">Số lượng:</header>
                                                    <div
                                                        class="custom input_number_product custom-btn-number form-control">
                                                        <button class="btn_num num_2 button button_qty"
                                                                onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                                type="button">+
                                                        </button>
                                                        <button class="btn_num num_1 button button_qty"
                                                                onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"
                                                                type="button">-
                                                        </button>
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                        <input type="number" id="qtym" name="quantity" value="1" class="form-control prd_quantity">
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                        class="btn btn-lg  btn-cart button_cart_buy_enable add_to_cart btn_buy btn-cart2">
                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Endtab -->
                        <!-- Tab -->
                        <div class="tab_width_full">
                            <div class="row xs-margin-top-15">
                                <div id="tab_ord" class="col-xs-12 col-sm-12 col-lg-9 col-md-9">
                                    <!-- Nav tabs -->
                                    <div class="product-tab e-tabs not-dqtab">
                                        <span class="border-dashed-tab"></span>
                                        <ul class="tabs tabs-title clearfix">
                                            <li class="tab-link current" data-tab="tab-1">
                                                <h3><span>Thông tin sản phẩm</span></h3>
                                            </li>
                                        </ul>
                                        <div class="tab-float woocommerce">
                                            <div id="tab-1" class="tab-content content_extab current">
                                                <div class="rte">
                                                    {!! $product->detail !!}
                                                </div>

                                                <hr/>

                                                <div class="col-sm-12">
                                                    <div class="product_review">
                                                        @include('web.product.element.product_review')
                                                    </div>

                                                    <div class="product_comment">
                                                        @include('web.product.element.product_comment')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3">

                                    <div class="product_sidebar_box">
                                        <div class="product_sidebar_box_title">
                                            Cùng thương hiệu
                                        </div>
                                        <div class="product_sidebar_box_content">
                                            @if(!empty($sameBrand) && !$sameBrand->isEmpty())
                                                @foreach($sameBrand as $key => $value)
                                                    <div class="item_product_main">
                                                        @include('web.product.single_product', ['value' => $value])
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="product_sidebar_box">
                                        <div class="product_sidebar_box_title">
                                            Cùng loại bề mặt
                                        </div>
                                        <div class="product_sidebar_box_content">
                                            @if(!empty($sameSurface) && !$sameSurface->isEmpty())
                                                @foreach($sameSurface as $key => $value)
                                                    <div class="item_product_main">
                                                        @include('web.product.single_product', ['value' => $value])
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="product_sidebar_box">
                                        <div class="product_sidebar_box_title">
                                            Sản phẩm vừa xem
                                        </div>
                                        <div class="product_sidebar_box_content">
                                            @php $recentProduct = \App\Libs\WebLib::getRecentProduct(); @endphp
                                            @if(!empty($recentProduct) && !$recentProduct->isEmpty())
                                                @foreach($recentProduct as $key => $value)
                                                    <div class="item_product_main">
                                                        @include('web.product.single_product', ['value' => $value])
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product_sidebar_box">
                                        <div class="product_sidebar_box_title">
                                            Sản phẩm vừa xem
                                        </div>
                                        <div class="product_sidebar_box_content">
                                            @php $recentProduct = \App\Libs\WebLib::getRecentProduct(); @endphp
                                            @if(!empty($recentProduct) && !$recentProduct->isEmpty())
                                                @foreach($recentProduct as $key => $value)
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
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="related_module f-width margin-bottom-30">
                            <div class="title_module_main a-left">
                                <h2>
                                    <a href="{{ route('web.product.category', ['link' => ($product->category->link ?? '')]) }}"
                                       title="Sản phẩm tương tự">
                                        <span><span>Sản phẩm tương tự</span></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="wrap_owl">
                                <div class="owl-carousel owl-related"
                                     data-nav="true"
                                     data-dot="true"
                                     data-lg-items="4"
                                     data-md-items="4"
                                     data-height="true"
                                     data-xs-items="1"
                                     data-sm-items="3"
                                     data-margin="15">
                                    @if(!empty($otherProduct) && !$otherProduct->isEmpty())
                                        @foreach($otherProduct as $key => $value)
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

            </div>
        </div>

    </section>
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
