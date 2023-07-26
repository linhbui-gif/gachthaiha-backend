<!-- START HEADER-->
<?php
$menuDetail = $menuTop->detail;
//dd($menuDetail);
?>
<header class="header_wrap">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8  mb-2 mb-lg-0">
                    <div class="header_topbar_info">
                        <div class="header_offer"><span>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::ADDRESS) }}</span></div>
                        <div class="header_offer"><span><i class="fa fa-clock mr-2"></i>8:30 - 17:30</span></div>
                        <div class="header_offer"><span><i class="fa fa-phone mr-2"></i>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}</span></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end flex-wrap">
                        @if(!empty($menuDetail))
                            @foreach($menuDetail as $key => $value)
                              <div class="header_offer"><a style="color:white" href="{{$value->link}}">{{$value->title}}</a></div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-wrap-body">
        <div class="middle-header dark_skin">
            <div class="container">
                <div class="nav_block"><a class="navbar-brand" href="/"><img class="logo_light" src="https://gachtot.vn/wp-content/uploads/2022/06/gach-tot-logo.png" width="150px" alt="logo"><img class="logo_dark" src="https://gachtot.vn/wp-content/uploads/2022/06/gach-tot-logo.png" width="150px" alt="logo"></a>
                    <div class="contact_phone order-md-last"><i class="linearicons-phone-wave"></i><span>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}</span></div>
                    <div class="product_search_form">
                        <form method="get" action="{{route('web.product.search')}}">
                            <div class="input-group">
                                <input class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{request()->get("keyword")}}"  type="text">
                                <button class="search_btn" name="keyword" type="submit"><i class="linearicons-magnifier"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_header dark_skin main_menu_uppercase">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"><span class="ion-android-menu"></span></button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">

                            <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Thương hiệu</a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        @foreach(\App\Models\Brand::$listType as $typeKey => $typeName)
                                        <li class="mega-menu-col col-lg-4">
                                            <ul>
                                                <li class="dropdown-header">{{ $typeName }}</li>
                                                @php
                                                    $listBrand = \App\Libs\WebLib::getBrandByType($typeKey);
                                                @endphp
                                                @if(!empty($listBrand))
                                                    @foreach($listBrand as $key => $value)
                                                     <li><a class="dropdown-item nav-link nav_item" href="{{ route('web.product.brand', ['link' => $value->link]) }}">{{ $value->name }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @php $listCategory = \App\Libs\WebLib::getParentProductCategory(); @endphp
                            @if(!empty($listCategory))
                                @foreach($listCategory as $key => $value)
                                    @php $href = route('web.product.category', ['link' => $value->link]); @endphp
                                    <li class="dropdown">
                                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"> {{ $value->name }}</a>
                                        @if(!$value->child->isEmpty())
                                            <div class="dropdown-menu">
                                                <ul>
                                                    @foreach($value->child as $k => $v)
                                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('web.product.category', ['link' => $v->link]) }}">{{ $v->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <ul class="navbar-nav attr-nav align-items-center">
                        <li><a class="nav-link search_trigger" href="javascript:void(0);"><i class="linearicons-magnifier"></i></a>
                            <div class="search_wrap"><span class="close-search"><i class="ion-ios-close-empty"></i></span>
                                <form method="get" action="{{route('web.product.search')}}">
                                    <input class="form-control" name="keyword" id="search_input" type="text" placeholder="Search">
                                    <button class="search_icon" type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            <div class="search_overlay"></div>
                            <div class="search_overlay"></div>
                        </li>
                        <li class="dropdown cart_dropdown">
                            <a class="nav-link " href="/gio-hang">
                                <?php $cart = Cart::count(); ?>
                                <i class="linearicons-cart"></i>
                                <span class="cart_count">{{$cart ?? 0}}</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER-->