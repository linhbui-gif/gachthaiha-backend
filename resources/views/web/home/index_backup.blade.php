@extends('web.layouts.layout')
@section('title', 'Trang chủ')
@section('content')
    <div id="slide-main-h3" class="slide-main-h3">
        @if (!empty($banner))
            @php $bannerDetail = $banner->detail; @endphp
            @if (!empty($bannerDetail))
                @foreach($bannerDetail as $key => $value)
                    @php $bannerImage = $value->image; @endphp
                    <div class="item ">
                        <div class="content-slide insLoadIMG isShow ">
                            <img class="owl-lazy" data-src="{{ $bannerImage }}" alt="Banner">

                            <div class="caption-slide" style="padding-top: 200px;">
                                <span>{{ $value->title }}</span>
                                {!! $value->description !!}
                                <a href="{{ $value->link }}">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>

    <!-- slide-main-h1 -->
    <div id="our-story-v3" class="our-story-v3">
        @php $listService = \App\Libs\WebLib::getServices(); @endphp
        @if(!empty($listService))
            @foreach($listService as $key => $value)
                <div class="part-os-v3">
                    <a href="{{ route('web.service.detail', ['link' => $value->link]) }}" class="left-part-os-v3">
                        <img class="lazy" src="{{ $value->image }}" alt="{{ $value->name }}">
                    </a>
                    <div class="right-part-os-v3">
                        <div class="box-our-story-v3">
                            <i>{{ $value->name }}</i>
                            <p>
                                {{ $value->description }}
                            </p>
                            <ul>
                                @if(!empty($value->property))
                                    @foreach($value->property as $k => $v)
                                        <li>
                                            <a href="#">
                                                <img src="{{ $v['image'] }}"
                                                     style="width: 55px; height: 55px; object-fit: cover; max-width: 100px;"
                                                     alt="">
                                                <span>{{ $v['title'] }}</span>
                                                <p>{{ $v['description'] }}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <a href="{{ route('web.service.detail', ['link' => $value->link]) }}">Xem thêm</a>
                        </div>
                        <!-- box-our-story-v3 -->
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- our-story-v3 -->
    <!-- our-story-v3 -->

    <div id="best-sell-v3" class="best-sell-v3">
        <div class="same-title">
            <i>Các sản phẩm trong gói</i>
            <h2>Dịch vụ</h2>
        </div>
        <div class="slide-best-sell-v3 owl-nav-tr">
            @if(!empty($hotProduct))
                @foreach($hotProduct as $key => $value)
                    @php $href = route('web.product.detail', ['link' => $value->link]); @endphp
                    <div class="item">
                        <div class="pdLoopItem animated zoomIn">
                            <div class="itemLoop clearfix">
                                <div class="ct-box-op">
                                    <div class="pdLoopImg elementFixHeight">
                                        <a href="{{ $href }}" title="{{ $value->name }}">
                                            <img alt="{{ $value->name }}" data-reg="false" class="imgLoopItem"
                                                 src="{{ $value->image }}"
                                                 style="width: 203px; height: 203px; object-fit: cover;"/>
                                        </a>
                                    </div>
                                    <div class="pdLoopDetail text-center clearfix">
                                        <h3 class="pdLoopName">
                                            <a class="productName" href="{{ $href }}"
                                               title="Acaiberry grande">{{ $value->name }}
                                            </a>
                                        </h3>
                                        <p class="pdPrice">
                                            <span>{{ number_format($value->price, 0, ',', '.') }}₫</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <div id="why-cs-v3" class="why-cs-v3">
        <div class="same-title">
            <i>Tại sao chọn chúng tôi</i>
            <h2>Các sản phẩm tốt nhất</h2>
        </div>
        <div class="container">
            <div class="content-why-cs-v3">
                <div class="col-left">
                    @php
                    $leftAdvantage = \App\Libs\WebLib::getAdvantage(\App\Models\Advantage::POSITION_LEFT);
                    @endphp
                    @if(!empty($leftAdvantage))
                        @foreach($leftAdvantage as $key => $value)
                            <div class="item-os">
                                <img src="{{ $value->image }}" style="width: 70px; height: 70px; object-fit: cover;" alt="{{ $value->name }}">
                                <h4>{{ $value->name }}</h4>
                                <p>
                                    {{ $value->description }}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-right">
                    @php
                        $rightAdvantage = \App\Libs\WebLib::getAdvantage(\App\Models\Advantage::POSITION_RIGHT);
                    @endphp
                    @if(!empty($rightAdvantage))
                        @foreach($rightAdvantage as $key => $value)
                            <div class="item-os">
                                <img src="{{ $value->image }}" style="width: 70px; height: 70px; object-fit: cover;" alt="{{ $value->name }}">
                                <h4>{{ $value->name }}</h4>
                                <p>
                                    {{ $value->description }}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-center text-center">
                    <img class="lazy" src="{{ asset('assets/frontend/images/worker.png') }}" style="width: 80%;"
                         alt="">
                </div>
            </div>
            <!-- content-why-cs-v3 -->
        </div>
    </div>

    <!-- why-cs-v3 -->

    <div class="deals-of-v3">
        <div class="content-do-v3">
            <h2>Những con số biết nói</h2>
            <div class="clockdiv clockdiv-home3">
                @php
                $businessIndex = \App\Libs\WebLib::getSetting(\App\Models\Setting::BUSINESS_INDEX);
                $businessIndex = explode("\r\n", $businessIndex);
                @endphp
                @if(!empty($businessIndex))
                    @foreach($businessIndex as $key => $value)
                        @php $index = explode('|', $value); @endphp
                        <div>
                            <span class="days">{{ !empty($index[0]) ? trim($index[0]) : '' }}</span>
                            <div class="smalltext">{{ !empty($index[1]) ? trim($index[1]) : '' }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
            <a href="{{ route('web.page.detail', ['link' => 'gioi-thieu']) }}">Tìm hiểu thêm</a>
        </div>
    </div>

    <!-- deals-of-v3 -->

    @include('web.elements.finished_project')

    <!-- farm-cate-v3 -->

    <div id="latest-blog-v3" class="latest-blog-v3">
        <div class="same-title">
            <i>Danh sách</i>
            <h2>Bài viết mới</h2>
        </div>
        <div class="container">
            <div class="row">
                @php
                    $newPost = \App\Libs\WebLib::getNewPost();
                @endphp
                @if(!$newPost->isEmpty())
                    @foreach($newPost as $key => $value)
                        @php
                            $href = route('web.news.detail', ['link' => $value->link]);
                        @endphp
                        <div class="col-md-4 col-sm-4 col-xs-6 articelItem">
                            <div class="stArticleLoop">
                                <div class="box-latest-news">
                                    <a href="{{ $href }}"
                                       class="thumb-img">
                                        <div class="mask-plus">
                                            <div class="shape"></div>
                                        </div>
                                        <img data-reg="false" class="imgLoopItem"
                                             src="{{ $value->image }}"
                                             style="width: 380px; height: 297px; object-fit: cover;"
                                             alt="{{ $value->name }}">
                                    </a>
                                    <div class="content-ln">
                                        <span>{{ date('d/m/Y', strtotime($value->created_at)) }}</span>
                                        <a href="{{ $href }}" title="{{ $value->name }}">
                                            <h3>{{ $value->name }}</h3>
                                        </a>
                                        <a href="{{ $href }}">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- latest-blog-v3 -->


    <div class="our-clients-v3">
        <h1>Ý KIẾN KHÁCH HÀNG</h1>
        <div class="container">
            <div class="slider-clients owlDesign notDots">
                <?php $customerReview = \App\Libs\WebLib::getCustomerReview(); ?>
                @if(!empty($customerReview))
                    @foreach($customerReview as $key => $value)
                        <div class="item">
                            <figure>
                                <p>“{{ $value->content }}”</p>
                                <img src="{{ $value->image }}" alt="{{ $value->customer_name }}">
                                <figcaption>Jessica Nguyễn</figcaption>
                            </figure>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- our-clients-v3 -->


    <div class="branding-v3">
        @php
            $partner = \App\Libs\WebLib::getPartner();
        @endphp
        @if(!$partner->isEmpty())
            @foreach($partner as $key => $value)
                <div class="item">
                    <a href="{{ $value->link }}">
                        <img src="{{ $value->image }}" alt="{{ $value->name }}"
                             style="filter: grayscale(100%); width: 120px; height: 60px; object-fit: contain;">
                    </a>
                </div>
            @endforeach
        @endif

    </div>
    <!-- branding-v3 -->
@endsection