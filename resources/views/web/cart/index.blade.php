@extends('web.layouts.layout')
@section('title', 'Giỏ hàng')
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        "Giỏ hàng",
    ]
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => 'Giỏ hàng'])

    <div class="section">
        <div class="container">
            <form action="{{ route('web.cart.index') }}" method="post" novalidate="" class="margin-bottom-0">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Ảnh sản phẩm</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Số lượng</th>
                                <th class="product-remove">Xoá</th>
                            </tr>
                            </thead>
                            <tbody class="cart-item-render">
                            <?php $cart = Cart::content();
                            $totalAmount = 0;
                            ?>
                            @if(!$cart->isEmpty())
                                @foreach($cart as $key => $value)
                                <?php $href = route('web.product.detail', ['link' => $value->model->link]); ?>
                                 <tr>
                                <td class="product-thumbnail"><a title="{{ $value->name }}" href="{{ $href }}">
                                        <img alt="{{ $value->name }}"
                                             src="{{ $value->model->image }}"></a></td>
                                <td class="product-name" data-title="Product"><a href="{{ $href }}">{{ $value->name }}</a></td>
                                <td class="product-price" data-title="Price">{{ number_format($value->price) }}₫</td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity input_qty_pr">
                                        <input
                                                type="button"
                                                value="-"
                                                class="minus"
                                        >
                                        <input
                                                id="qtyItem{{ $value->rowId }}"
                                                data-id="{{ $value->rowId }}"
                                                type="text"
                                                name="quantity"
                                                value="{{ $value->qty }}"
                                                title="Qty"
                                                class="qty input_qty qtyItem{{ $value->rowId }}"
                                                size="4"
                                        >
                                        <input
                                                type="button"
                                                value="+"
                                                class="plus"
                                        >
                                    </div>
                                </td>
                                     @php
                                         $amount = $value->qty * $value->price;
                                         $totalAmount += $amount;
                                     @endphp
                                <td class="product-subtotal" data-title="Total">{{ number_format($amount) }}₫</td>
                                <td class="product-remove" data-title="Remove"><a href="{{ route('web.cart.delete', ['id' => $value->rowId]) }}"
                                                                                  data-id="{{ $value->rowId }}"><i class="ti-close"></i></a></td>
                            </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">Tạm tính</td>
                                    <td class="cart_total_amount"><strong>{{ number_format($totalAmount) }}₫</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('web.cart.checkout') }}" class="btn btn-fill-out">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.cart-item-render').on('click', '.plus', function () {
                let inputQty = $(this).siblings('.input_qty');
                let inputValue = parseInt(inputQty.val()) + 1;
                let id = inputQty.attr('data-id');
                $('.spinner').show();
                $.ajax({
                    url: `/gio-hang/update/${id}/${inputValue}`,
                    type: 'get',
                    dataType: 'json',
                    data: { quantity: inputValue },
                    success: function (res) {
                        if (res.success) {
                            $('.spinner').hide();
                            $(".cart-item-render").html(res.html);
                        }
                    },
                    error: function () {
                        alert('Có lỗi trong quá trình thêm sản phẩm vào giỏ hàng. Mời bạn thử lại');
                    }
                });
            });
            $('.cart-item-render').on('click', '.minus', function () {
                let inputQty = $(this).next('.input_qty');
                let inputValue = parseInt(inputQty.val()) - 1;
                let id = inputQty.attr('data-id');
                $('.spinner').show();
                $.ajax({
                    url: `/gio-hang/update/${id}/${inputValue}`,
                    type: 'get',
                    dataType: 'json',
                    data: { quantity: inputValue },
                    success: function (res) {
                        if (res.success) {
                            $('.spinner').hide();
                            $(".cart-item-render").html(res.html);
                        }
                    },
                    error: function () {
                        alert('Có lỗi trong quá trình thêm sản phẩm vào giỏ hàng. Mời bạn thử lại');
                    }
                });
            });
        });
    </script>
@endsection
