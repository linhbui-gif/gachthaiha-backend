@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới danh mục';
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
                            {!! Form::label('name', 'Tên danh mục', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control generate_alias',
                            'data-render' => 'render_link', 'placeholder' => 'Tên danh mục']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', trans('admin.link'), ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('link', old('link'), ['class' => 'form-control render_link', 'placeholder' => trans('admin.link')]) !!}
                            <span class="help-block text-red validation_error hide validation_link"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Danh mục cha', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <?php
                            $listParent = !empty($listParent) ? ['' => 'Chọn danh mục cha'] + $listParent : []
                            ?>
                            {!! Form::select('parent_id', $listParent,
                                old('parent_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_parent_id"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Ảnh mô tả', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="input-group">
                                {!! Form::text('image', old('image'), ['class' => 'form-control', 'id' => 'partner_image', 'placeholder' => 'Ảnh mô tả']) !!}
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
                            {!! Form::label('is_hot', 'Có phải danh mục đang hot không?', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <?php
                            $isHot = [
                                \App\Models\BaseModel::STATUS_INACTIVE => 'Không',
                                \App\Models\BaseModel::STATUS_ACTIVE => 'Có'
                            ];
                            ?>
                            {!! Form::select('is_hot', $isHot, old('is_hot'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_is_hot"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả danh mục', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'editor1', 'placeholder' => 'Mô tả danh mục']) !!}
                            <span class="help-block text-red validation_error hide validation_description"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        {!! \App\Libs\SeoLib::adminSEOBox(\App\Models\NewsCategory::class, !empty($seo) ? $seo : '') !!}
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

@section('script')
    @include('admin.layouts.elements.ckeditor_script')
@endsection