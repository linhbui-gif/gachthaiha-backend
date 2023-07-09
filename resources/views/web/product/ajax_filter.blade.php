<div class="row">
    @if(!empty($listProduct) && !$listProduct->isEmpty())
        @foreach($listProduct as $key => $value)
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 product-col">
                <div class="item_product_main collection_check margin-bottom-10">
                    @include('web.product.single_product', ['value' => $value])
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="text-xs-right paginate_center xs_padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="pagination">
        @if(!empty($listProduct))
            {{ $listProduct->links() }}
        @endif
    </div>
</div>
