<?php $href = route('web.product.detail', ['link' => $data->link]); ?>
<div class="product">
    <div class="product_img"><a href="{{$href}}"><img src="{{ $data->image }}" alt="{{ $data->name }}" /></a></div>
    <div class="product_info">
        <h6 class="product_title"><a href="{{ $href }}" title="{{ $data->name }}">{{ $data->name }}</a></h6>
        <div class="product_price"><span class="price">{{ number_format($data->price) }}₫/m2</span>
            <!--del $55.25-->
            <!--.on_sale-->
            <!--    span 35% Off-->
        </div>
    </div>
</div>