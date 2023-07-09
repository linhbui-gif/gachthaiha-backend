@extends('web.layouts.layout')
@section('title', 'Đặt hàng')
@section('content')
    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">Đặt hàng</p>
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
                            <li><strong><span itemprop="title">Đặt hàng</span></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container" style="margin-bottom: 100px">
        <div class="block_container">
            <div class="block_title text-uppercase">
                Đặt hàng
            </div>
            <div class="block_content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <table class="table table-striped" style="border-bottom: solid 1px #ddd;">
                                <thead>
                                <tr>
                                    <th colspan="2" class="text-center text-uppercase">Sản phẩm</th>
                                    <th class="text-uppercase">Giá</th>
                                    <th class="text-uppercase">Số lượng</th>
                                    <th class="text-uppercase">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $cart = Cart::content(); ?>
                                @if(!$cart->isEmpty())
                                    @foreach($cart as $key => $value)
                                        <?php $href = route('web.product.detail', ['link' => $value->model->link]); ?>
                                        <tr>
                                            <td>
                                                <a href="{{ $href }}">
                                                    <img src="{{ $value->model->image }}"
                                                         class="img-responsive"
                                                         alt="{{ $value->name }}"
                                                         style="width: 50px; height: 80px; object-fit: cover;"/>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-uppercase" style="display: block;" href="{{ $href }}">
                                                    {{ $value->name }}
                                                </a>

                                                @if($value->options->has('color'))
                                                    <label style="display: block;">Màu:
                                                        <span style="width: 20px; height: 8px; display: inline-block; background: {{ $value->options->color }}"></span>
                                                    </label>
                                                @endif

                                                @if($value->options->has('size'))
                                                    <label style="display: block;">Size: {{ $value->options->size }}</label>
                                                @endif
                                            </td>
                                            <td>
                                                {{ number_format($value->price) }}đ
                                            </td>
                                            <td>
                                                {{ $value->qty }}
                                            </td>
                                            <td>
                                                {{ number_format($value->price * $value->qty) }}đ
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Không có sản phẩm nào trong giỏ hàng</td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr style="font-weight: bold;">
                                    <td colspan="4" class="text-right">Tổng tiền</td>
                                    <td>
                                        <lable>{{ Cart::total() }}đ</lable>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="cart_info_box">
                            <form name="frm_checkout" class="frm_checkout" method="post" action="">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên của bạn" />
                                <span class="help-block text-red validation_error hide validation_name"></span>
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại của bạn để chúng tôi gọi điện xác nhận đơn hàng" />
                                <span class="help-block text-red validation_error hide validation_phone"></span>
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ giao hàng</label>
                                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ bạn muốn nhận hàng" />
                                <span class="help-block text-red validation_error hide validation_address"></span>
                            </div>

                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="note" class="form-control" style="resize: vertical" rows="5"
                                          placeholder="Bạn có lưu ý gì đặc biệt khi giao hàng không?"></textarea>
                                <span class="help-block text-red validation_error hide validation_note"></span>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn_submit_contact">Đặt hàng</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script type="text/javascript" language="JavaScript">
    $(document).ready(function () {
        $('.frm_checkout').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(res){
                    if(res.success){
                        window.location = '{{ route('web.cart.checkout_success') }}';
                    }else{
                        alert(res.message);
                    }
                },
                error: function(error){
                    alert('Vui lòng điền đầy đủ thông tin');
                }
            });
        });
    });
</script>
@endsection
