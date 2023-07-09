<section class="section_hoptac" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="container">
        <div class="row">
            <div class="brand_carousel owl-carousel owl-theme">
                @php
                    $brand = \App\Libs\WebLib::getBrand();
                @endphp
                @if(!empty($brand))
                    @foreach($brand as $key => $value)
                        <div class="item">
                            <img src="{{ $value->image }}" style="width: 150px; height: 70px; object-fit: contain;" alt="{{ $value->name }}" class="img-responsive" />
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<section class="footer-1" style="padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-1-link">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="inner">
                                <h4>Gạch Thái Hà</h4>
                                <div class="adr">
                                    <p>Địa chỉ:</p>
                                    <span>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::ADDRESS) }}</span>
                                </div>
                                <div class="adr">
                                    <p>Điện thoại:</p>
                                    <span>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="inner">
                                <h4>Giới thiệu chung</h4>
                                <ul>

                                    <li><a class="ef" href="{{ route('Home_index') }}">Trang chủ</a></li>

                                    <li><a class="ef" href="{{ route('web.product.index') }}">Sản phẩm</a></li>

                                    <li><a class="ef" href="{{ route('web.news.index') }}">Tin tức</a></li>

                                    <li><a class="ef" href="{{ route('Home_contact') }}">Liên hệ</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="inner">
                                <h4>Thông tin hữu ích</h4>
                                <ul>
                                    <li><a class="ef" rel="nofollow" href="{{ route('web.page.detail', ['link' => 'gioi-thieu']) }}">Về chúng tôi</a></li>
                                    <li><a class="ef" rel="nofollow" href="{{ route('web.page.detail', ['link' => 'huong-dan-dat-hang']) }}">Hướng dẫn đặt hàng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="inner">
                                <h4>Mạng xã hội</h4>
                                <div>
                                    <a rel="nofollow" href="{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::FANPAGE_URL) }}" class="block_social" title="Theo dõi chúng tôi trên Facebook">
                                        <img src="{{ asset('assets/frontend/images/ico_fb.png') }}" data-lazyload="{{ asset('assets/frontend/images/ico_fb.png') }}" alt="facebook">
                                    </a>
                                    <a rel="nofollow" href="{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::YOUTUBE_LINK) }}" class="block_social" title="Theo dõi chúng tôi trên Youtube">
                                        <img src="{{ asset('assets/frontend/images/ico_ytb.png') }}" data-lazyload="{{ asset('assets/frontend/images/ico_ytb.png') }}" alt="Youtube">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="bottom-footer">
        <div class="container">
            <div class="row row_footer">
                <div id="copy1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row tablet">
                        <div id="copyright" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fot_copyright a-left">
                            <span class="wsp">
                                <span class="mobile">@2018 - Bản quyền thuộc về {{ env('APP_NAME') }} </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="back-to-top" class="backtop"  title="Lên đầu trang"><i class="fa fa-angle-up"></i></a>

</footer>

<script src='{{ asset('assets/frontend/js/option-selectors.js') }}' type='text/javascript'></script>
<script src='{{ asset('assets/frontend/js/api.jquery.js') }}' type='text/javascript'></script>

<!-- Plugin JS -->
<script src='{{ asset('assets/frontend/js/plugin.js') }}' type='text/javascript'></script>

<script src='{{ asset('assets/frontend/js/main.js') }}' type='text/javascript'></script>
<!-- Main JS -->