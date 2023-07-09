<?php $href = route('web.product.detail', ['link' => $value->link]); ?>
<div class="product-box product-item-main product-item-compare">
    <div class="product-thumbnail">
        <a class="image_thumb p_img" href="{{ $href }}"
           title="{{ $value->name }}">
            <img src="{{ $value->image }}"
                 data-lazyload="{{ $value->image }}"
                 alt="{{ $value->name }}">
        </a>
    </div>
    <div class="product-info product-bottom">
        <h3 class="product-name">
            <a href="{{ $href }}" title="{{ $value->name }}">{{ $value->name }}</a>
        </h3>
        <div class="reviews_item_product active">
            <div class="bizweb-product-reviews-badge" data-id="1017793273"></div>
        </div>
        <div class="product-item-price price-box active">
            <span class="special-price">
                <span class="price product-price">
                    {{ number_format($value->price) }}₫
                </span>
            </span>
        </div>
        <div class="product-action ef clearfix">
            <form action="#" method="post" class="variants form-nut-grid">
                <div class="group_action text-center">
                    <a class="btn-buy btn-cart button_35 left-to" title="Đặt mua" href="{{ $href }}">
                        <span>Xem chi tiết</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
