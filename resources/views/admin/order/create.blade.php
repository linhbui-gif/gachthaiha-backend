@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Xem đơn hàng';
@endphp
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {{ $pageTitle }}
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(!empty($record))
                    {!! Form::model($record, ['method' => 'POST', 'class' => 'frm_form_add']) !!}
                @else
                    {!! Form::open(['method' => 'POST', 'class' => 'frm_form_add']) !!}
                @endif
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên khách hàng', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên khách hàng']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Số điện thoại', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) !!}
                            <span class="help-block text-red validation_error hide validation_phone"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Địa chỉ', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Địa chỉ']) !!}
                            <span class="help-block text-red validation_error hide validation_address"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('note', 'Ghi chú', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::textarea('note', old('note'), ['class' => 'form-control', 'placeholder' => 'Ghi chú', 'rows' => 5, 'style' => 'resize: vertical;']) !!}
                            <span class="help-block text-red validation_error hide validation_note"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('payment_method', 'Phương thức thanh toán', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <p>{{ $record->payment_method == 1 ? "Tiền mặt" : "Chuyển khoản"  }}</p>
                            <span class="help-block text-red validation_error hide validation_address"></span>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        @if(!empty($record))
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $detail = $record->detail;
                                    $totalAmount = 0;
                                    ?>
                                    @if(!$detail->isEmpty())
                                        @foreach($detail as $key => $value)
                                            <?php $amount = $value->price * $value->quantity;
                                            $totalAmount += $amount;
                                            ?>
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $value->product->name }}
                                                    <?php $option = json_decode($value->option); ?>
                                                    @if(!empty($option))
                                                        @foreach($option as $k => $v)
                                                            <label class="label label-default">{{ $k. ': '. $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{ number_format($value->price) }}</td>
                                                <td>{{ $value->quantity }}</td>
                                                <td>{{ number_format($amount) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Không có sản phẩm nào trong đơn hàng
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">Tổng</th>
                                        <th>{{ number_format($totalAmount) }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <hr/>
                            <a class="btn btn-primary" href="/admin/order"><i class="fa fa-check"></i> Quay lại danh sách đơn hàng</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('script')
    @include('admin.layouts.elements.ckeditor_script')
@endsection