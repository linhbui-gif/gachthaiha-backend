@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới đánh giá của khách hàng';
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
                            {!! Form::label('customer_name', 'Tên khách hàng', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('customer_name', old('customer_name'), ['class' => 'form-control', 'placeholder' => 'Tên khách hàng']) !!}
                            <span class="help-block text-red validation_error hide validation_customer_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('position', 'Chức vụ', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('position', old('position'), ['class' => 'form-control', 'placeholder' => 'Chức vụ']) !!}
                            <span class="help-block text-red validation_error hide validation_customer_position"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('company', 'Công ty/tổ chức', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('company', old('company'), ['class' => 'form-control', 'placeholder' => 'Tên công ty/tổ chức']) !!}
                            <span class="help-block text-red validation_error hide validation_company"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Ảnh đại diện', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="input-group">
                                {!! Form::text('image', old('name'), ['class' => 'form-control', 'id' => 'partner_image', 'placeholder' => 'Ảnh đại diện']) !!}
                                <div class="input-group-btn">
                                    <div class="btn btn-primary btn-upload-file"
                                         onclick="selectFileWithCKFinder('partner_image');">
                                        <i class="fa fa-image"></i> {{ trans('admin.select_image') }}
                                    </div>
                                </div>
                            </div>
                            <span class="help-block text-red validation_error hide validation_image"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            @php
                                $status = array(
                                    \App\Models\BaseModel::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\BaseModel::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp
                            {!! Form::select('status', ['' => 'Chọn trạng thái'] + $status, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Nội dung đánh giá', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => 'Nội dung đánh giá']) !!}
                            <span class="help-block text-red validation_error hide validation_content"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
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
@section('script')
    @include('admin.layouts.elements.ckeditor_script')
@endsection