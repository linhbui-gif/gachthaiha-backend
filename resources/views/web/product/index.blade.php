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
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <h3>{{$title}}</h3>
                    </div>
                </div>
                <div class="ajax_show_product">
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
                </div>

            </div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                @include('web.shop.shop-sidebar')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.frm_filter_product').submit(function (e) {
                e.preventDefault();
                $('.spinner').show();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(res){
                        if(res.success){
                            $('.spinner').hide();
                            $('.ajax_show_product').html(res.html);
                        }
                    },
                    error: function(){
                        alert('Có lỗi trong quá trình lọc sản phẩm. Mời bạn thử lại sau');
                    }
                });
            });
        });
    </script>
@endsection
