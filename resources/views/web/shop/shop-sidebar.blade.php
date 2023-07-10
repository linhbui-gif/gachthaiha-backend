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
@php
    if(!empty($category)){
     if(empty($category->parent_id)){
        $parentId = $category->id;
     }else{
       $parentId = $category->parent_id;
     }
     $listProductCategory = \App\Libs\WebLib::getProductCategoryByParent($parentId);
      }else{
      if(!empty($isBrandPage) && !empty($brand)){
       $listProductCategory = \App\Libs\WebLib::getProductCategoryByBrandId($brand->id);
       }else{
       $listProductCategory = \App\Libs\WebLib::getProductCategory();
       }
      }
@endphp

<aside>
    <form name="frm_filter_product" class="frm_filter_product" method="post" action="{{ route('web.product.filter') }}">
        @csrf
        <div class="sidebar">
            <div class="widget mt-2">
                <h5 class="widget_title">Danh mục sản phẩm</h5>
                <ul class="widget_categories">
                    @if(!empty($listProductCategory) && !$listProductCategory->isEmpty())
                        @foreach($listProductCategory as $key => $value)
                            <li><a href="{{ route('web.product.category', ['link' => $value->link]) }}"><span class="categories_name">{{ $value->name }}</span></a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="sidebar">
            <div class="widget mt-2">
                <h5 class="widget_title">Chọn kích thước</h5>
                <ul class="widget_categories">
                    @if(!empty($productSize))
                        @foreach($productSize as $key => $value)
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="size_id[]"
                                       value="{{ $value->id }}" id="size{{$key}}">
                                <label class="form-check-label" for="size{{$key}}">{{ $value->name }}</label>
                            </div>
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
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="brand_id[]"
                                   value="{{ $value->id }}" id="brand{{$key}}">
                            <label class="form-check-label" for="brand{{$key}}">{{ $value->name }}</label>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="widget mt-2">
            <h5 class="widget_title">Loại gạch</h5>
            <ul class="widget_categories">
                @if(!empty($productType))
                    @foreach($productType as $key => $value)
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="type_id[]"
                                   value="{{ $value->id }}" id="type{{$key}}">
                            <label class="form-check-label" for="type{{$key}}">{{ $value->name }}</label>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="widget mt-2">
            <h5 class="widget_title">Lọc theo mức giá</h5>
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
            <ul class="widget_categories">
                @if(!empty($price))
                    @foreach($price as $key => $value)
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="price[]"
                                   value="{{ $value['from_price'].'-'.$value['to_price'] }}" id="price{{$key}}">
                            <label class="form-check-label" for="price{{$key}}">{{ $value['title'] }}</label>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
        <button class="btn btn-fill-out btn-sm mt-3 mb-3" >Lọc sản phẩm</button>
    </form>
    <div class="widget mt-2">
        <h5 class="widget_title">Sản phẩm mới nhất</h5>
        <ul class="widget_recent_post">
            @if(!empty($newestProduct))
                @foreach($newestProduct as $key => $value)
                 <li>
                <div class="post_img"><a href="{{route('web.product.detail', ['link' => $value->link])}}"><img
                                src="{{$value->image}}"
                                alt="shop_small1"></a></div>
                <div class="post_content">
                    <h6 class="product_title"><a href="{{route('web.product.detail', ['link' => $value->link])}}">{{$value->name}}</a></h6>
                    <div class="product_price"><span class="price">{{ number_format($value->price) }}₫ /m2</span>
                    </div>
                </div>
            </li>
                @endforeach
            @endif
        </ul>
    </div>
</aside>