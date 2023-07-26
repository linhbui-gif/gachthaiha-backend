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

    <div class="section cart-page">
        <?php $cart = Cart::content();
        function sumCart(array $arr) {
            return array_reduce($arr, function ($carry, $item) {
                return $carry + ($item['price'] * $item['qty']);
            }, 0);
        }
        $totalAmount = sumCart($cart->toArray());
        ?>
        @if(!empty($cart->toArray()))
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
                                <th class="product-subtotal">Tạm tính</th>
                                <th class="product-remove">Xoá</th>
                            </tr>
                            </thead>
                            <tbody class="cart-item-render">
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
                                     @endphp
                                <td class="product-subtotal" data-title="Total">{{ number_format($amount) }}₫</td>
                                <td class="product-remove" data-title="Remove"><a href="{{ route('web.cart.delete', ['id' => $value->rowId]) }}"
                                                                                  data-id="{{ $value->rowId }}"><i class="ti-close"></i></a></td>
                            </tr>
                                @endforeach

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
                            <h6>Tổng số tiền trong giỏ hàng</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">Tổng</td>
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
        @else
            <div class="text-center">
                <img src="https://ebook-demo.netlify.app/static/media/image-empty.2b0b05a6.png" alt="not-have-product">
                <p>Không có sản phẩm nào trong giỏ hàng </p>
                <a href="/san-pham" class="btn btn-fill-out">Tiếp tục mua hàng</a>
            </div>
        @endif
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
                            $(".cart_total_amount strong").html(res.total);
                            $(".cart_count").html(res.number_product)
                            Swal.fire({
                                icon: 'success',
                                text: 'Cập nhật giỏ hàng thành công',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    },
                    error: function () {
                        $('.spinner').hide();
                        Swal.fire({
                            icon: 'error',
                            text: 'Có lỗi trong quá trình cập nhật sản phẩm vào giỏ hàng. Mời bạn thử lại!',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
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
                            $(".cart_total_amount strong").html(res.total);
                            $(".cart_count").html(res.number_product)
                            if(res.is_empty_cart){
                                $(".cart-page").html(`
                                <div class="text-center">
                                    <img src="https://ebook-demo.netlify.app/static/media/image-empty.2b0b05a6.png" alt="not-have-product">
                                    <p>Không có sản phẩm nào trong giỏ hàng </p>
                                    <a href="/san-pham" class="btn btn-fill-out">Tiếp tục mua hàng</a>
                                </div>
                                `)
                            }
                            Swal.fire({
                                icon: 'success',
                                text: 'Cập nhật giỏ hàng thành công',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            text: 'Có lỗi trong quá trình cập nhật sản phẩm vào giỏ hàng. Mời bạn thử lại!',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            });
        });
    </script>
@endsection
