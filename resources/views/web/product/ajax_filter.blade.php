<div class="row shop_container grid">
    @if(!empty($listProduct) && !$listProduct->isEmpty())
        @foreach($listProduct as $key => $value)
            <div class="col-md-4 col-6">
                @include('web.components.shop.shop-product-item',['data' => $value])
            </div>
        @endforeach
    @else
        <div class="not-result w-100 d-flex mt-5">
            <img style="margin: auto" src="https://ebook-demo.netlify.app/static/media/image-empty.2b0b05a6.png" alt="">
        </div>
        <p class="text-center w-100">Không có sản phẩm nào</p>
    @endif
</div>
<div class="row">
    <div class="col-12">
        <ul class="pagination mt-3 justify-content-center pagination_style1">
            @if(!empty($listProduct))
                {{ $listProduct->links() }}
            @endif
        </ul>
    </div>
</div>