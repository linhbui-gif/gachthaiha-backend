@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới đối tác';
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
                            {!! Form::label('name', 'Tên đối tác', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên đối tác']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Đường dẫn', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Nhập # nếu không dẫn đến link nào cả']) !!}
                            <span class="help-block text-red validation_error hide validation_link"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Ảnh logo', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="input-group">
                                {!! Form::text('image', old('image'), ['class' => 'form-control', 'id' => 'partner_image', 'placeholder' => 'Ảnh logo']) !!}
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