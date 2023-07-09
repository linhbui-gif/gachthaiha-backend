<form name="frm_filter_product" class="frm_filter_product" method="post" action="{{ route('web.product.filter') }}">
@csrf

    <aside class="aside-item filter-vendor">
        <div class="title_module_main_custome block">
            <h2>
                <span>Lọc theo thương hiệu</span>
            </h2>
        </div>
        <div class="aside-content filter-group">
            @php
                if(!empty($category)){
                    $brand = \App\Libs\WebLib::getBrandByCategoryId($category->id);
                }else{
                    $brand = \App\Libs\WebLib::getBrand();
                }
            @endphp
            <ul>
                @if(!empty($brand))
                    @foreach($brand as $key => $value)
                        <li class="filter-item filter-item--check-box filter-item--green ">
                            <span>
                                <label>
                                    <input type="checkbox" name="brand_id[]" value="{{ $value->id }}">
                                    <i class="fa"></i>
                                    {{ $value->name }}
                                </label>
                            </span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </aside>

<aside class="aside-item filter-vendor">
    <div class="title_module_main_custome block">
        <h2>
            <span>Lọc theo loại gạch</span>
        </h2>
    </div>
    <div class="aside-content filter-group">
        @php
            $productType = \App\Libs\WebLib::getProductType();
        @endphp
        <ul>
            @if(!empty($productType))
                @foreach($productType as $key => $value)
                    <li class="filter-item filter-item--check-box filter-item--green ">
                        <span>
                            <label>
                                <input type="checkbox" name="product_type[]" value="{{ $value->id }}">
                                <i class="fa"></i>
                                {{ $value->name }}
                            </label>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</aside>

<aside class="aside-item filter-vendor">
    <div class="title_module_main_custome block">
        <h2>
            <span>Lọc theo bề mặt gạch</span>
        </h2>
    </div>
    <div class="aside-content filter-group">
        @php
            $productSurface = \App\Libs\WebLib::getProductSurface();
        @endphp
        <ul>
            @if(!empty($productSurface))
                @foreach($productSurface as $key => $value)
                    <li class="filter-item filter-item--check-box filter-item--green ">
                        <span>
                            <label>
                                <input type="checkbox" name="product_surface[]" value="{{ $value->id }}">
                                <i class="fa"></i>
                                {{ $value->name }}
                            </label>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</aside>

<aside class="aside-item filter-type">
    <div class="title_module_main_custome block">
        <h2 class=" margin-top-0"><span>Lọc theo kích thước</span></h2>
    </div>
    <div class="aside-content filter-group">
        @php
            $productSize = \App\Libs\WebLib::getSize();
        @endphp
        <ul>
            @if(!empty($productSize))
                @foreach($productSize as $key => $value)
                    <li class="filter-item filter-item--check-box filter-item--green ">
                        <span>
                            <label>
                                <input type="checkbox" name="product_type[]" value="{{ $value->id }}">
                                <i class="fa"></i>
                                {{ $value->name }}
                            </label>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</aside>

<aside class="aside-item filter-price">
    <div class="title_module_main_custome block">
        <h2 class="margin-top-0"><span>Lọc theo mức giá</span></h2>
    </div>
    <div class="aside-content filter-group">
        <ul>
            <?php
            $price = [
                [
                    'title' => 'Giá dưới 100.000đ',
                    'from_price' => 0,
                    'to_price' => 100000
                ],
                [
                    'title' => 'Từ 100.000đ đến 500.000đ',
                    'from_price' => 100000,
                    'to_price' => 500000
                ],
                [
                    'title' => 'Giá trên 500.000đ',
                    'from_price' => 500000,
                    'to_price' => 100000000
                ]
            ];
            ?>
            @if(!empty($price))
                @foreach($price as $key => $value)
                    <li class="filter-item filter-item--check-box filter-item--green">
                        <span>
                            <label>
                                <input type="checkbox" name="price[]" value="{{ $value['from_price'].'-'.$value['to_price'] }}">
                                <i class="fa"></i>
                                {{ $value['title'] }}
                            </label>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</aside>

    <button class="btn btn-primary">Lọc sản phẩm</button>

</form>
