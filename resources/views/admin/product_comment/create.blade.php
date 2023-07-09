@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới kích thước';
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('product_id', 'Sản phẩm', ['class' => 'control-label']) !!}
                            {!! Form::select('product_id', ['' => 'Chọn sản phẩm'] + $listProduct, old('product_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_product_id"></span>
                        </div>

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
                            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            <span class="help-block text-red validation_error hide validation_email"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comment', 'Nội dung bình luận', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Nội dung bình luận']) !!}
                            <span class="help-block text-red validation_error hide validation_comment"></span>
                        </div>


                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            @php
                                $status = array(
                                    \App\Models\BaseModel::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\BaseModel::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp
                            {!! Form::select('status', $status, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <hr/>
                            <button class="btn btn-primary"><i class="fa fa-check"></i> {{ $pageTitle }}</button>
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
