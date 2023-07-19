@extends('web.layouts.layout')
@section('title', 'Đặt hàng')
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        "Đặt hàng",
    ]
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => "Đặt hàng"])

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <form method="post" name="frm_checkout" class="frm_checkout">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1">
                        <h4>Chi tiết thanh toán</h4>
                    </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text"  class="form-control" name="name" placeholder="Họ và Tên...">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="phone" placeholder="Số điện thoại...">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="text" name="address" placeholder="Địa chỉ giao hàng...">
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" class="form-control" name="note" placeholder="Ghi chú đơn hàng..."></textarea>
                        </div>

                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Đơn hàng của bạn</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $cart = Cart::content(); ?>
                                @if(!$cart->isEmpty())
                                    @foreach($cart as $key => $value)
                                        <?php $href = route('web.product.detail', ['link' => $value->model->link]); ?>
                                    <tr>
                                        <td>{{ $value->name }} <span class="product-qty">x {{ $value->qty }}</span></td>
                                        <td>{{ number_format($value->price * $value->qty) }}đ</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Không có sản phẩm nào trong giỏ hàng</td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">{{ Cart::total() }}đ</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="heading_s1">
                                <h4>Phương thức thanh toán</h4>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios3" value="1" checked="">
                                    <label class="form-check-label" for="exampleRadios3">Trả tiền mặt khi nhận hàng</label>
                                    <p data-method="option3" class="payment-text" style="">Trả tiền mặt khi giao hàng</p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios4" value="2">
                                    <label class="form-check-label" for="exampleRadios4">Chuyển khoản ngân hàng</label>
                                    <p data-method="option4" class="payment-text" style="display: none;">Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-fill-out btn-block btn_submit_contact">Đặt hàng</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
<script type="text/javascript" language="JavaScript">
    $(document).ready(function () {
        $('.frm_checkout').submit(function (e) {
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
                        swal({
                            title: "Đặt hàng thành công",
                            text: res?.message,
                            icon: "success",
                            button: "OK",
                        }).then((value) => {
                            if (value) {
                                window.location = '{{ route('web.cart.checkout_success') }}';
                            }
                        });
                    }else{
                        $('.spinner').hide();
                        alert(res.message);
                    }
                },
                error: function(error){
                    $('.spinner').hide();
                    alert('Vui lòng điền đầy đủ thông tin');
                }
            });
        });
    });
</script>
@endsection
