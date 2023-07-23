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
     $mainImage = $product->image;
     $mainImageIndex = array_search($mainImage, $galleryProduct);

     // Set the activeImageIndex
     $activeImageIndex = $mainImageIndex !== false ? $mainImageIndex : 0;
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => $product->name])
    @include('web.elements.modal_contact')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                            <div class="product-image">
                                <div class="product_img_box">
                                    <img id="product_img" src="{{ $mainImage }}" data-zoom-image="{{ $mainImage }}" alt="product_img1">
                                    <a class="product_img_zoom" href="#" title="Zoom">
                                        <span class="linearicons-zoom-in">
                                        </span>
                                    </a>
                                </div>
                                <div class="product_gallery_item slick_slider" id="pr_item_gallery" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                    @if(!empty($galleryProduct))
                                        @foreach($galleryProduct as $key => $url)
                                        <div class="item">
                                            <a class="product_gallery_item @if ($activeImageIndex === $key) active @endif" href="#" data-image="{{ $url }}" data-zoom-image="{{$url}}">
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
                                        <button class="btn btn-facebook" type="button" style="color:white" data-toggle="modal" data-target="#modalContact"> Báo giá công trình</button>
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
                <style>
                    .rating-review {
                        direction: rtl; /* Đảo ngược thứ tự sao */
                        unicode-bidi: bidi-override;
                        text-align: center;
                        font-size: 36px;
                    }

                    .rating-review input {
                        display: none; /* Ẩn input radio */
                    }

                    .rating-review label {
                        display: inline-block;
                        cursor: pointer;
                        color: #ddd; /* Màu sao không được chọn */
                    }

                    .rating-review label:hover,
                    .rating-review label:hover ~ label,
                    .rating-review input:checked ~ label {
                        color: #ffcc00; /* Màu sao khi hover hoặc đã chọn */
                    }
                </style>
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Mô tả</a></li>
                                    <li class="nav-item"><a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Thông tin bổ sung</a></li>
                                    <li class="nav-item"><a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Review" role="tab" aria-controls="Reviews" aria-selected="false">Đánh giá</a></li>
{{--                                    <li class="nav-item"><a class="nav-link" id="Comment-tab" data-toggle="tab" href="#Comment" role="tab" aria-controls="Comments" aria-selected="false">Bình luận</a></li>--}}
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
                                    <div class="tab-pane fade" id="Review" role="tabpanel" aria-labelledby="Reviews-tab">
                                        @include('web.product.element.product_review')
                                        <div class="review_form field_form">
                                            <h5>Để lại đánh giá</h5>
                                            <form class="row mt-3 form_review" method="post" name="form_review" action="{{route('web.product.review')}}">
                                                {{ csrf_field() }}
                                                <div class="form-group col-12">
                                                    <div class="rating-review">
                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                        <label for="star5" title="5 stars">&#9733;</label>
                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                        <label for="star4" title="4 stars">&#9733;</label>
                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label for="star3" title="3 stars">&#9733;</label>
                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                        <label for="star2" title="2 stars">&#9733;</label>
                                                        <input type="radio" id="star1" name="rating" value="1" />
                                                        <label for="star1" title="1 star">&#9733;</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <textarea  placeholder="Nội dung đánh giá *" class="form-control" name="comment" rows="4"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input  placeholder="Nhập tên của bạn *" class="form-control" name="name" type="text">
                                                </div>
                                                <input type="hidden" name="product_review_id" value="{{$product->id}}">
                                                <div class="form-group col-12">
                                                    <button  class="btn btn-fill-out">Để lại đánh giá</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
{{--                                    <div class="tab-pane fade" id="Comment" role="tabpanel" aria-labelledby="Comment-tab">--}}
{{--                                        @include('web.product.element.product_comment',['product' => $product])--}}
{{--                                    </div>--}}
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
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="heading_s1">--}}
{{--                                <h3>Sản phẩm tương tự</h3>--}}
{{--                            </div>--}}
{{--                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive="{&quot;0&quot;:{&quot;items&quot;: &quot;1&quot;}, &quot;481&quot;:{&quot;items&quot;: &quot;2&quot;}, &quot;768&quot;:{&quot;items&quot;: &quot;3&quot;}, &quot;1199&quot;:{&quot;items&quot;: &quot;4&quot;}}">--}}
{{--                                @if(!empty($otherProduct) && !$otherProduct->isEmpty())--}}
{{--                                    @foreach($otherProduct as $key => $value)--}}
{{--                                        <div class="item">--}}
{{--                                            @include('web.components.shop.shop-product-item',['data' => $value])--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
            let selectedRating = '';
            $('#add-to-cart-form').submit(function(e){
                e.preventDefault();
                $('.spinner').show();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        if(res.success){
                            $('.cart_count').text(res.number_product);
                            $('.spinner').hide();
                            swal({
                                title: "Thành công",
                                text: res?.message,
                                icon: "success",
                                button: "OK",
                            })
                        }else{
                            Swal.fire({
                                icon: 'error',
                                text: res.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            icon: 'error',
                            text: 'Có lỗi trong quá trình thêm sản phẩm vào giỏ hàng. Mời bạn thử lại',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            });
            $(".form_review").submit(function (e){
                e.preventDefault();
                $('.spinner').show();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        if(res.success){
                            $('.spinner').hide();
                            swal({
                                title: "Đánh giá thành công",
                                text: res?.message,
                                icon: "success",
                                button: "OK",
                            }).then(() => {
                                window.location = '{{ route('web.product.detail',['link' => $product->link]) }}';
                            })
                        }else{
                            $('.spinner').hide();
                            swal({
                                title: "Đánh giá thất bại",
                                text: res?.message,
                                icon: "warning",
                                button: "OK",
                            })
                        }
                    },
                    error: function(error){
                        $('.spinner').hide();
                        swal({
                            title: "Đánh giá thất bại",
                            text: res?.message,
                            icon: "warning",
                            button: "OK",
                        })
                    }
                });
            })
            $(".form_contact").submit(function (e){
                e.preventDefault();
                $('.spinner').show();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        if(res.success){
                            $('.spinner').hide();
                            $('#modalContact').modal('hide');
                            swal({
                                title: "Thành công!",
                                text: res?.message,
                                icon: "success",
                                button: "OK",
                            }).then(() => {
                                $(".form_contact :input").val('');
                            })
                        }else{
                            $('.spinner').hide();
                            swal({
                                title: "THất bại!",
                                text: res?.message,
                                icon: "warning",
                                button: "OK",
                            })
                        }
                    },
                    error: function(error){
                        $('.spinner').hide();
                        $('#modalContact').modal('hide');
                        swal({
                            title: "THất bại!",
                            text: res?.message,
                            icon: "warning",
                            button: "OK",
                        })
                    }
                });
            })
        });
    </script>
@endsection
