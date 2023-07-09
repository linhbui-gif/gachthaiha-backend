<div class="hidden-md hidden-lg opacity_menu"></div>
<div class="opacity_filter"></div>
<div class="body_opactiy"></div>
<div class="op_login"></div>
<!-- Main content -->
<section class="topheader hidden-xs">
    <div class="container">
        <div class="row" style="font-size: 12px;">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <span>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOME_SEO_TITLE) }}</span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 a-right">
                {{ \App\Libs\WebLib::getSetting(\App\Models\Setting::ADDRESS) }}. SĐT: {{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}.
            </div>
        </div>
    </div>
</section>
<header class="header topbar_ect">
    <div class="topbar">
        <div class="container">
            <div class="menu-bar button-menu hidden-md hidden-lg">
                <a href="javascript:;">
                    <i class="fa fa-align-justify"></i>
                </a>
            </div>
            <div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-2 col-md-2 a-left">
                        <div class="logo a-center">
                            <a href="/" class="logo-wrapper ">
                                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Logo">
                            </a>

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2 col-md-5 col-lg-5 hidden-sm hidden-xs">
                        <div class="search_topbox" style="padding-top: 26px;">
                            <div class="search-box">
                                <div class="header_search search_form search-auto">
                                    <form class="input-group search-bar search_form" action="{{ route('web.product.search') }}" method="get" role="search">
                                        <input type="search" name="q" value="" placeholder="Tìm kiếm.. "
                                               class="auto-search-tdq input-group-field st-default-search-input search-text"
                                               autocomplete="off">
                                        <span class="input-group-btn">
                                            <button class="btn icon-fallback-text">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="title_cart_header hidden-sm hidden-xs">
                            <a href="{{ route('web.cart.index') }}">Giỏ hàng</a>
                            <div class="icount"><span class="cartCount count_item_pr">0</span> Sản phẩm</div>
                        </div>
                        <div class="top-cart-contain f-right">
                            <div class="mini-cart text-xs-center">
                                <div class="heading-cart">
                                    <a href="{{ route('web.cart.index') }}">
                                        <i class="fa fa-shopping-bag"></i>
                                        <span class="hidden-lg hidden-md cartCount count_item_pr"
                                              id="cart-total"></span>
                                    </a>
                                </div>
                                <?php /* ?>
                                <div class="top-cart-content">
                                    <ul id="cart-sidebar" class="mini-products-list count_li">
                                        <ul class="list-item-cart">
                                            <li class="item productid-1034664910">
                                                <div class="wrap_item">
                                                    <a class="product-image" href="/products/giuong-go-xoan-dao" title="Giường gỗ xoan đào">
                                                        <img
                                                                alt="Giường gỗ xoan đào"
                                                                src="//product.hstatic.net/1000339943/product/upload_5c4c695f12bf46b7b0c74cc96ade604f_compact.jpg"
                                                                width="80">
                                                    </a>
                                                    <div class="detail-item">
                                                        <div class="product-details">
                                                            <a href="javascript:;" data-id="1034664910" title="Xóa" class="remove-item-cart fa fa-close">
                                                                &nbsp;</a>
                                                            <h3 class="product-name text1line">
                                                                <a
                                                                        href="/products/giuong-go-xoan-dao"
                                                                        title="Giường gỗ xoan đào">
                                                                    Giường gỗ xoan đào
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="product-details-bottom">
                                                            <span class="price">1,500,000₫</span>
                                                            <span class="hidden quaty item_quanty_count"> x 1</span>
                                                            <div class="quantity-select qty_drop_cart"><input
                                                                        class="variantID" type="hidden" name="Id"
                                                                        value="1034664910">
                                                                <button onclick="var result = document.getElementById('qty1034664910'); var qty1034664910 = result.value; if( !isNaN( qty1034664910 ) &amp;&amp; qty1034664910 > 1 ) result.value--;return false;"
                                                                        class="btn_reduced reduced items-count btn-minus"
                                                                        type="button">–
                                                                </button>
                                                                <input type="text" maxlength="12" readonly=""
                                                                       class="input-text number-sidebar qty1034664910"
                                                                       id="qty1034664910" name="Lines" size="4"
                                                                       value="1">
                                                                <button onclick="var result = document.getElementById('qty1034664910'); var qty1034664910 = result.value; if( !isNaN( qty1034664910 )) result.value++;return false;"
                                                                        class="btn_increase increase items-count btn-plus"
                                                                        type="button">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="wrap_total">
                                            <div class="top-subtotal hidden">Phí vận chuyển: <span class="pricex">Tính khi thanh toán</span>
                                            </div>
                                            <div class="top-subtotal">Tổng tiền tạm tính: <span
                                                        class="price">9,000,000₫</span></div>
                                        </div>
                                        <div class="wrap_button">
                                            <div class="actions"><a href="/cart"
                                                                    class="btn btn-gray btn-cart-page pink hidden"><span>Đến giỏ hàng</span></a>
                                                <a href="/checkout" class="btn btn-gray btn-checkout pink"><span>Tiến hành thanh toán</span></a>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                                <?php */ ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="btn btn-info pull-left" style="margin-top: 30px; margin-right: 30px;">Báo giá</div>
                        <div class="pull-left" style="padding-top: 23px;">
                            <b>HotLine:</b><br/>
                            <label style="font-size: 20px;">{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}</label>
                        </div>
                        <div class="clear-fix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<div class="main-nav mrbottom">
    <div class="container nav-head">
        <div class="row">
            <div class="col-lg-12 col-md-8">
                <nav class="hidden-sm hidden-xs nav-main">
                    <div class="menu_hed head_1">
                        <ul class="nav nav_1">
                            <li class=" nav-item nav-items">
                                <a class="nav-link" href="#">
                                    Thương hiệu
                                    <i class="fa fa-caret-down" data-toggle="dropdown"></i>
                                </a>
                                <div class="mega-content hidden-md">
                                    <div class="nav-width nav-block nav-block-center">
                                        <ul class="level0 row">
                                            @foreach(\App\Models\Brand::$listType as $typeKey => $typeName)
                                                <li class="level1 parent col-sm-4">
                                                    <h4 class="h4">
                                                        <a href="#"><span>{{ $typeName }}</span></a>
                                                    </h4>
                                                    <ul class="level2">
                                                        @php
                                                            $listBrand = \App\Libs\WebLib::getBrandByType($typeKey);
                                                        @endphp
                                                        @if(!empty($listBrand))
                                                            @foreach($listBrand as $key => $value)
                                                                <li class="level2">
                                                                    <a href="{{ route('web.product.brand', ['link' => $value->link]) }}">
                                                                        <span>{{ $value->name }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            @php $listCategory = \App\Libs\WebLib::getParentProductCategory(); @endphp
                            @if(!empty($listCategory))
                                @foreach($listCategory as $key => $value)
                                    @php $href = route('web.product.category', ['link' => $value->link]); @endphp
                                    <li class="menu_hover nav-item nav-items @if(!$value->child->isEmpty()) has-mega @endif">
                                        <a href="{{ $href }}" class="nav-link ">
                                            {{ $value->name }}
                                            @if(!$value->child->isEmpty())
                                                <i class="fa fa-caret-down" data-toggle="dropdown"></i>
                                            @endif
                                        </a>
                                        @if(!$value->child->isEmpty())
                                            <div class="mega-content hidden-md">
                                                <div class="nav-width nav-block nav-block-center">
                                                    <ul class="level0 row">
                                                        <li class="level1 parent col-sm-6">
                                                            <h4 class="h4">
                                                                <a href="#"><span>LOẠI GẠCH</span></a>
                                                            </h4>
                                                            <ul class="level2">
                                                                @foreach($value->child as $k => $v)
                                                                    <li class="level2">
                                                                        <a href="{{ route('web.product.category', ['link' => $v->link]) }}">
                                                                            <span>{{ $v->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>

                                                        <li class="level1 parent col-sm-6">
                                                            <h4 class="h4">
                                                                <a href="#"><span>KÍCH THƯỚC</span></a>
                                                            </h4>
                                                            <ul class="level2">
                                                                @if(!$value->size->isEmpty())
                                                                    @foreach($value->size as $k => $v)
                                                                        <li class="level2">
                                                                            <a href="#">
                                                                                <span>{{ $v->name }}</span>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Menu mobile -->
<div class="menu_mobile sidenav max_991 hidden-md hidden-lg" id="mySidenav">
    <ul class="ul_collections">
        <li class="special">
            <a href="#">MENU</a>
        </li>

        <li class="level0 level-top parent">
            <a href="{{ route('Home_index') }}">Trang chủ</a>
        </li>
        <li class="level0 level-top parent">
            <a href="#">Thương hiệu</a>
            <i class="fa fa-angle-down"></i>
            <ul class="level0" style="display:none;">
                @foreach(\App\Models\Brand::$listType as $typeKey => $typeName)
                    <li class="level1 ">
                        <a href="#"> <span>{{ $typeName }}</span> </a>
                        <i class="fa fa-angle-down"></i>
                        <ul class="level1" style="display:none;">
                            @php
                                $listBrand = \App\Libs\WebLib::getBrandByType($typeKey);
                            @endphp
                            @if(!empty($listBrand))
                                @foreach($listBrand as $key => $value)
                                    <li class="level2">
                                        <a href="{{ route('web.product.brand', ['link' => $value->link]) }}">
                                            <span>{{ $value->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
        @php $listCategory = \App\Libs\WebLib::getParentProductCategory(); @endphp
        @if(!empty($listCategory))
            @foreach($listCategory as $key => $value)
                @php $href = route('web.product.category', ['link' => $value->link]); @endphp
                <li class="level0 level-top parent">
                    <a href="{{ $href }}">{{ $value->name }}</a>
                    @if(!$value->child->isEmpty())
                    <i class="fa fa-angle-down"></i>
                    <ul class="level0" style="display:none;">
                        <li class="level1 ">
                            <a href="#"> <span>LOẠI GẠCH</span> </a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="level1" style="display:none;">
                                @foreach($value->child as $k => $v)
                                    <li class="level2 ">
                                        <a href="{{ route('web.product.category', ['link' => $v->link]) }}"><span>{{ $v->name }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="level1 ">
                            <a href="#"> <span>KÍCH THƯỚC</span> </a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="level1" style="display:none;">
                                @if(!$value->size->isEmpty())
                                    @foreach($value->size as $k => $v)
                                        <li class="level2">
                                            <a href="#">
                                                <span>{{ $v->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                        @endif
                </li>
            @endforeach
        @endif
        <li class="level0 level-top parent">
            <a href="{{ route('web.news.index') }}">Tin tức</a>

        </li>

        <li class="level0 level-top parent">
            <a href="{{ route('Home_contact') }}">Liên hệ</a>

        </li>

        <li class="level0 level-top parent">
            <a href="{{ route('web.page.detail', ['link' => 'gioi-thieu']) }}">Về chúng tôi</a>
        </li>

    </ul>


</div>
<!-- End -->

<script src='{{ asset('assets/frontend/js/jquery-2.2.3.min.js') }}' type='text/javascript'></script>
