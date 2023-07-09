@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới liên hệ';
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
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

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
                            {!! Form::label('name', 'Tên liên hệ', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên liên hệ']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Số ĐT', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Số ĐT']) !!}
                            <span class="help-block text-red validation_error hide validation_phone"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            <span class="help-block text-red validation_error hide validation_email"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Địa chỉ', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Địa chỉ']) !!}
                            <span class="help-block text-red validation_error hide validation_address"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề liên hệ', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Tên liên hệ']) !!}
                            <span class="help-block text-red validation_error hide validation_title"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('content', 'Nội dung liên hệ', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => 'Nội dung liên hệ']) !!}
                            <span class="help-block text-red validation_error hide validation_content"></span>
                        </div>

                        <div class="form-group">
                            @php
                                $status = array(
                                    \App\Models\BaseModel::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\BaseModel::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp

                            {!! Form::label('status', 'Trạng thái ', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::select('status', $status, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
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