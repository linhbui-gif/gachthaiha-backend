@php
$title = !empty($category) ? $category->name : (!empty($brand) ? $brand->name : 'Sản phẩm');
@endphp
@extends('web.layouts.layout')
@section('title', $title)
@section('content')
<?php
    $breadCrumbList = [
        "Trang chủ",
        "Sản phẩm",
        $title
    ]
?>
@include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => $title])
{{--    <div class="breadcrumb_background">--}}
{{--        <div class="title_full">--}}
{{--            <div class="container a-center">--}}
{{--                <h1 class="title_page_breadcrumb">{{ $title }}</h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <section class="bread-crumb">--}}
{{--            <span class="crumb-border"></span>--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xs-12 a-left">--}}
{{--                        <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">--}}
{{--                            <li class="home">--}}
{{--                                <a itemprop="url" href="/"><span itemprop="title">Trang chủ</span></a>--}}
{{--                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>--}}
{{--                            </li>--}}
{{--                            <li><strong><span itemprop="title"> {{ $title }}</span></strong></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <aside class="sidebar  left-content col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}

{{--                <aside class="aside-item collection-category margin-top-15 margin-bottom-15">--}}
{{--                    <div class="title_module_main_custome block">--}}
{{--                        <h2 class="margin-top-0"><span>Danh mục sản phẩm</span></h2>--}}
{{--                    </div>--}}
{{--                    <div class="aside-content aside-cate-link-cls">--}}
{{--                        <nav class="cate_padding nav-category navbar-toggleable-md">--}}
{{--                            <ul class="nav-ul nav navbar-pills ul_nav_collection">--}}
{{--                                @php--}}
{{--                                    if(!empty($category)){--}}
{{--                                        if(empty($category->parent_id)){--}}
{{--                                            $parentId = $category->id;--}}
{{--                                        }else{--}}
{{--                                            $parentId = $category->parent_id;--}}
{{--                                        }--}}
{{--                                        $listProductCategory = \App\Libs\WebLib::getProductCategoryByParent($parentId);--}}
{{--                                    }else{--}}
{{--                                        if(!empty($isBrandPage) && !empty($brand)){--}}
{{--                                            $listProductCategory = \App\Libs\WebLib::getProductCategoryByBrandId($brand->id);--}}
{{--                                        }else{--}}
{{--                                            $listProductCategory = \App\Libs\WebLib::getProductCategory();--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                @endphp--}}
{{--                                @if(!empty($listProductCategory) && !$listProductCategory->isEmpty())--}}
{{--                                    @foreach($listProductCategory as $key => $value)--}}
{{--                                    <li class="nav-item lv1">--}}
{{--                                        <a class="nav-link" href="{{ route('web.product.category', ['link' => $value->link]) }}">{{ $value->name }}</a>--}}
{{--                                    </li>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </aside>--}}

{{--                <div class="aside-filter filter-content">--}}
{{--                    @include('web.product.filter_product')--}}
{{--                </div>--}}
{{--            </aside>--}}

{{--            <section class="main_container collection col-lg-9 col-md-9 col-sm-12 col-xs-12">--}}
{{--                <section class="link_collections margin-bottom-15 col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                    <div class="link_row row">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <h2 style="margin: 0px; padding: 0px;">{{ $title }}</h2>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-12">--}}
{{--                            {{ $category->description ?? '' }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}

{{--                <div class="category-products products">--}}
{{--                    <section class="products-view products-view-grid margin-bottom-30 collection_reponsive product_check_hover ajax_show_product">--}}
{{--                        <div class="row">--}}
{{--                            @if(!empty($listProduct) && !$listProduct->isEmpty())--}}
{{--                                @foreach($listProduct as $key => $value)--}}
{{--                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 product-col">--}}
{{--                                        <div class="item_product_main collection_check margin-bottom-10">--}}
{{--                                            @include('web.product.single_product', ['value' => $value])--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="text-xs-right paginate_center xs_padding col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                            <div class="pagination">--}}
{{--                                @if(!empty($listProduct))--}}
{{--                                    {{ $listProduct->links() }}--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--            </section>--}}

{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.frm_filter_product').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        $('.ajax_show_product').html(res.html);
                    },
                    error: function(){
                        alert('Có lỗi trong quá trình lọc sản phẩm. Mời bạn thử lại sau');
                    }
                });
            });
        });
    </script>
@endsection
