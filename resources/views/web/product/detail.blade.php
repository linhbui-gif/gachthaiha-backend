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
                                    <img id="product_img" src="{{ @$galleryProduct[1] }}" data-zoom-image="{{ @$galleryProduct[1] }}" alt="product_img1">
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
                                <form enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('web.product.add_to_cart') }}" method="post">
                                    @csrf
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <div class="quantity">
                                            <input class="minus button_qty" type="button" value="-">
                                            <input class="qty"  id="qtym"  type="text" name="quantity" value="1" title="Qty" size="4">
                                            <input class="plus button_qty" type="button" value="+">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                        </div>
                                    </div>
                                    <div class="cart_btn mt-2">
                                        <button class="btn btn-fill-out btn-addtocart btn-cart2" type="submit"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                    </div>
                                    <div class="cart_btn mt-2">
                                        <button class="btn btn-facebook" type="button" style="color:white"> Báo giá công trình</button>
                                    </div>
                                </div>
                                </form>
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
                            $('.cart_count').text(res.number_product);
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
