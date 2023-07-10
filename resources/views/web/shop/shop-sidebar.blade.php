@php
    $productSize = \App\Libs\WebLib::getSize();
@endphp
@php
    if(!empty($category)){
        $brand = \App\Libs\WebLib::getBrandByCategoryId($category->id);
    }else{
        $brand = \App\Libs\WebLib::getBrand();
    }
@endphp
@php
    $productType = \App\Libs\WebLib::getProductType();
@endphp
<aside>
    <div class="sidebar">
        <div class="widget mt-2">
            <h5 class="widget_title">Chọn kích thước</h5>
            <ul class="widget_categories">
                @if(!empty($productSize))
                    @foreach($productSize as $key => $value)
                         <li><a href="#"><span class="categories_name">{{ $value->name }}</span></a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="widget mt-2">
        <h5 class="widget_title">Thương hiệu</h5>
        <ul class="widget_categories">
            @if(!empty($brand))
                @foreach($brand as $key => $value)
                   <li><a href="#"><span class="categories_name">{{ $value->name }}</span></a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="widget mt-2">
        <h5 class="widget_title">Loại gạch</h5>
        <ul class="widget_categories">
            @if(!empty($productType))
                @foreach($productType as $key => $value)
                   <li><a href="#"><span class="categories_name">{{ $value->name }}</span><span class="categories_num">(9)</span></a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="widget mt-2">
        <h5 class="widget_title">Bạn vừa xem</h5>
        <ul class="widget_recent_post">
            <li>
                <div class="post_img"><a href="#"><img src="https://gachtot.vn/wp-content/uploads/2023/07/gach-trung-quoc-90x180-TQ18928-qrc-300x300.jpg" alt="shop_small1"></a></div>
                <div class="post_content">
                    <h6 class="product_title"><a href="shop-product-detail.html">Gạch Ốp Lát 90×180 Trung Quốc TQ18928</a></h6>
                    <div class="product_price"><span class="price">750.000₫ /m2</span>
                        <!--del $95.00-->
                    </div>
                </div>
            </li>
            <li>
                <div class="post_img"><a href="#"><img src="https://gachtot.vn/wp-content/uploads/2023/07/gach-trung-quoc-90x180-TQ18928-qrc-300x300.jpg" alt="shop_small1"></a></div>
                <div class="post_content">
                    <h6 class="product_title"><a href="shop-product-detail.html">Gạch Ốp Lát 90×180 Trung Quốc TQ18928</a></h6>
                    <div class="product_price"><span class="price">750.000₫ /m2</span>
                        <!--del $95.00-->
                    </div>
                </div>
            </li>
            <li>
                <div class="post_img"><a href="#"><img src="https://gachtot.vn/wp-content/uploads/2023/07/gach-trung-quoc-90x180-TQ18928-qrc-300x300.jpg" alt="shop_small1"></a></div>
                <div class="post_content">
                    <h6 class="product_title"><a href="shop-product-detail.html">Gạch Ốp Lát 90×180 Trung Quốc TQ18928</a></h6>
                    <div class="product_price"><span class="price">750.000₫ /m2</span>
                        <!--del $95.00-->
                    </div>
                </div>
            </li>
            <li>
                <div class="post_img"><a href="#"><img src="https://gachtot.vn/wp-content/uploads/2023/07/gach-trung-quoc-90x180-TQ18928-qrc-300x300.jpg" alt="shop_small1"></a></div>
                <div class="post_content">
                    <h6 class="product_title"><a href="shop-product-detail.html">Gạch Ốp Lát 90×180 Trung Quốc TQ18928</a></h6>
                    <div class="product_price"><span class="price">750.000₫ /m2</span>
                        <!--del $95.00-->
                    </div>
                </div>
            </li>
            <li>
                <div class="post_img"><a href="#"><img src="https://gachtot.vn/wp-content/uploads/2023/07/gach-trung-quoc-90x180-TQ18928-qrc-300x300.jpg" alt="shop_small1"></a></div>
                <div class="post_content">
                    <h6 class="product_title"><a href="shop-product-detail.html">Gạch Ốp Lát 90×180 Trung Quốc TQ18928</a></h6>
                    <div class="product_price"><span class="price">750.000₫ /m2</span>
                        <!--del $95.00-->
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>