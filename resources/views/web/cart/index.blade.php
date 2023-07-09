@extends('web.layouts.layout')
@section('title', 'Giỏ hàng')
@section('content')
    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">Giỏ hàng của bạn</p>
            </div>
        </div>
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 a-left">
                        <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                            <li class="home">
                                <a itemprop="url" href="/"><span itemprop="title">Trang chủ</span></a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>
                            <li><strong><span itemprop="title">Giỏ hàng của bạn</span></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <p class="checktext_forbuy"></p>
    <section class="wrap_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page_title">
                        <h1 class="title_page_h1">Giỏ hàng của bạn</h1>
                    </div>
                    <div class="header-cart title_cart_pc hidden-sm hidden-xs"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-cart-page main-container col1-layout">
        <div class="main container hidden-xs hidden-sm">
            <div class="col-main cart_desktop_page cart-page">
                <div class="cart page_cart hidden-xs">
                    <form action="{{ route('web.cart.index') }}" method="post" novalidate="" class="margin-bottom-0">
                        <div class="bg-scroll">
                            <div class="cart-thead">
                                <div style="width: 18%" class="a-center">Ảnh sản phẩm</div>
                                <div style="width: 32%" class="a-center">Tên sản phẩm</div>
                                <div style="width: 17%" class="a-center"><span class="nobr">Đơn giá</span></div>
                                <div style="width: 14%" class="a-center">Số lượng</div>
                                <div style="width: 14%" class="a-center">Thành tiền</div>
                                <div style="width: 5%" class="a-center">Xoá</div>
                            </div>
                            <div class="cart-tbody">
                                <?php $cart = Cart::content();
                                $totalAmount = 0;
                                ?>
                                @if(!$cart->isEmpty())
                                    @foreach($cart as $key => $value)
                                        <?php $href = route('web.product.detail', ['link' => $value->model->link]); ?>
                                        <div class="item-cart productid-1034664910">
                                            <div style="width: 18%" class="image">
                                                <a class="product-image" title="{{ $value->name }}" href="{{ $href }}">
                                                    <img width="75" height="auto" alt="{{ $value->name }}"
                                                         src="{{ $value->model->image }}">
                                                </a>
                                            </div>
                                            <div style="width: 32%" class="a-center">
                                                <h3 class="product-name">
                                                    <a
                                                        class="text2line" href="{{ $href }}">{{ $value->name }}</a>
                                                </h3>
                                                <span class="variant-title"></span>
                                            </div>
                                            <div style="width: 17%" class="a-center">
                                                    <span class="item-price">
                                                        <span class="price">{{ number_format($value->price) }}₫</span>
                                                    </span>
                                            </div>
                                            <div style="width: 14%" class="a-center">
                                                <div class="input_qty_pr">
                                                    <input class="variantID" type="hidden" name="Id"
                                                           value="{{ $value->rowId }}">
                                                    <input type="text" maxlength="3"  min="1"
                                                           class="input_qty check_number_here input-text number-sidebar input_pop input_pop qtyItem{{ $value->rowId }}"
                                                           id="qtyItem{{ $value->rowId }}"
                                                           data-id="{{ $value->rowId }}"
                                                           name="Lines" size="4"
                                                           value="{{ $value->qty }}">
                                                    <button
                                                        onclick="var result = document.getElementById('qtyItem{{ $value->rowId }}'); var qtyItem{{ $value->rowId }} = result.value; if( !isNaN( qtyItem{{ $value->rowId }} )) result.value++;return false;"
                                                        class="increase_pop items-count btn-plus" type="button">+
                                                    </button>
                                                    <button
                                                        onclick="var result = document.getElementById('qtyItem{{ $value->rowId }}'); var qtyItem{{ $value->rowId }} = result.value; if( !isNaN( qtyItem{{ $value->rowId }} ) &amp;&amp; qtyItem{{ $value->rowId }} > 1 ) result.value--;return false;"
                                                        disabled="" class="reduced_pop items-count btn-minus"
                                                        type="button">-
                                                    </button>
                                                </div>
                                            </div>
                                            <div style="width: 14%" class="a-center">
                                                    <span class="cart-price">
                                                        @php
                                                            $amount = $value->qty * $value->price;
                                                            $totalAmount += $amount;
                                                        @endphp
                                                        <span class="price">{{ number_format($amount) }}₫</span>
                                                    </span>
                                            </div>
                                            <div style="width: 5%" class="a-center">
                                                <a
                                                   title="Xóa"
                                                   href="{{ route('web.cart.delete', ['id' => $value->rowId]) }}"
                                                   data-id="{{ $value->rowId }}">
                                                        <span>
                                                            <i class="fa fa-trash-o"></i>
                                                        </span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="row margin-top-20  margin-bottom-40">
                        <div class="col-lg-7 col-md-7">
                            <div class="form-cart-button">
                                <div class="">
                                    <a href="{{ route('web.product.index') }}" class="form-cart-continue">Tiếp tục mua
                                        hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 bg_cart shopping-cart-table-total">
                            <div class="table-total">
                                <table class="table ">
                                    <tbody>
                                    <tr>
                                        <td class="total-text">Tạm tính</td>
                                        <td class="txt-right totals_price price_end a-right">{{ number_format($totalAmount) }}₫</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('web.cart.checkout') }}" class="btn-checkout-cart button_checkfor_buy">
                                Tiến hành thanh toán
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-mobile hidden-md hidden-lg container">
            <form action="/cart" method="post" novalidate="" class="margin-bottom-0">
                <div class="title_cart_mobile">

                </div>

                <div class="header-cart-content" style="background:#fff;">


                </div>

            </form>

        </div>

    </section>
@endsection


@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.input_qty').change(function () {
                var quantity = $(this).val();
                var id = $(this).attr('data-id');
                var href = '/gio-hang/update/' + id + '/' + quantity;
                window.location = href;
            });
        });
    </script>
@endsection
