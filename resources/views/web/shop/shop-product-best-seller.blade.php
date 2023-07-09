<div class="section pb_20">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Sản phẩm khuyến mãi</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive="{&quot;0&quot;:{&quot;items&quot;: &quot;1&quot;}, &quot;481&quot;:{&quot;items&quot;: &quot;2&quot;}, &quot;768&quot;:{&quot;items&quot;: &quot;3&quot;}, &quot;1199&quot;:{&quot;items&quot;: &quot;4&quot;}}">
                    @if(!empty($promoteProduct))
                        @foreach($promoteProduct as $k => $productItem)
                            <div class="item">
                                @include('web.components.shop.shop-product-item', ['data' => $productItem])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>