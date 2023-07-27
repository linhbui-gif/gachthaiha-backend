<!-- START FOOTER-->
<footer class="bg_gray">
    <div class="footer_top small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo"><a href="#"><img width="150px" src="{{$data['config']->logo}}" alt="logo"></a></div>
                        <p class="mb-3">
                            Gạch ốp lát Thái Hà - 123 Thái Hà, Hà Nội, là một trong những đơn vị đi đầu cung cấp Gạch lát nền, ốp tường và Ngói lợp tại Việt Nam từ 2010.
                        </p>
                        <ul class="contact_info">
                            <li><i class="ti-location-pin"></i>
                                <p>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::ADDRESS) }}</p>
                            </li>
                            <li><i class="ti-email"></i><a href="mailto:info@sitename.com">info@sitename.com</a></li>
                            <li><i class="ti-mobile"></i>
                                <p>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Giới thiệu chung</h6>
                        <ul class="widget_links">
                            <li><a href="{{ route('Home_index') }}">Trang chủ</a></li>
                            <li><a class="ef" href="{{ route('web.product.index') }}">Sản phẩm</a></li>
                            <li><a class="ef" href="{{ route('web.news.index') }}">Tin tức</a></li>
                            <li><a class="ef" href="/">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">THÔNG TIN HỮU ÍCH</h6>
                        <ul class="widget_links">
                            <li><a class="ef" rel="nofollow" href="{{ route('web.page.detail', ['link' => 'gioi-thieu']) }}">Về chúng tôi</a></li>
                            <li><a class="ef" rel="nofollow" href="{{ route('web.page.detail', ['link' => 'huong-dan-dat-hang']) }}">Hướng dẫn đặt hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">MẠNG XÃ HỘI</h6>
                        <div class="widget mb-lg-0">
                            <ul class="social_icons text-center text-lg-left">
                                <li><a class="sc_facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a class="sc_twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a class="sc_google" href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a class="sc_youtube" href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a class="sc_instagram" href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <p class="mb-lg-0 text-center">&copy; @2023 - Bản quyền thuộc về {{ env('APP_NAME') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER-->