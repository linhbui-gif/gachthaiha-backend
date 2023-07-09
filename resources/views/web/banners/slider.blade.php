<!-- START SECTION BANNER-->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div class="carousel slide carousel-fade light_arrow" id="carouselExampleControls" data-ride="carousel">
        <div class="carousel-inner">
            @if(!empty($data))
                @php $bannerDetail = $data->detail; @endphp
                @if(!empty($bannerDetail))
                @foreach($bannerDetail as $k => $item)
                        @php $bannerImage = $item->image; @endphp
                    <div class="carousel-item {{$k % 2 === 0 ? "active" : ''}} background_bg" data-img-src="{{$bannerImage}}">
                        <div class="banner_slide_content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner_content overflow-hidden">
                                            <!--h5.mb-3.staggered-animation.font-weight-light(data-animation='slideInLeft' data-animation-delay='0.5s') Gạch ốp lát-->
                                            <!--h3.staggered-animation(data-animation='slideInLeft' data-animation-delay='1s') Kho gạch trên 1000 mẫu-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <i class="ion-chevron-left"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <i class="ion-chevron-right"></i>
        </a>
    </div>
</div><!-- END SECTION BANNER-->