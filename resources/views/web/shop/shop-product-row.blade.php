<div class="section small_pt pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Sản phẩm mới</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div class="row shop_container">
            @if(!empty($newProduct))
                @foreach($newProduct as $k => $productItem)
                    <div class="col-lg-3 col-md-4 col-6">
                        @include('web.components.shop.shop-product-item', ['data' => $productItem])
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>