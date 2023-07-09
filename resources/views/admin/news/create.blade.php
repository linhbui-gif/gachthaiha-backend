@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới tin tức';
@endphp
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(!empty($record))
            {!! Form::model($record, ['method' => 'POST', 'class' => 'frm_form_add']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'class' => 'frm_form_add']) !!}
        @endif
        <div class="row">
            <div class="col-sm-9">
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
                        <div class="form-group">
                            {!! Form::label('name', 'Tiêu đề tin', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control generate_alias',
                            'data-render' => 'render_link', 'placeholder' => 'Tiêu đề tin' ]) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', trans('admin.link'), ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('link', old('link'), ['class' => 'form-control render_link', 'placeholder' => trans('admin.link')]) !!}
                            <span class="help-block text-red validation_error hide validation_link"></span>
                        </div>


                        <div class="form-group">
                            <label class="control-label">{{ trans('admin.description') }}</label>
                            <span class="help-block text-red validation_error hide validation_description"></span>
                            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Mô tả ngắn về bài viết']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nội dung chi tiết</label>
                            <span class="help-block text-red validation_error hide validation_detail"></span>
                            {!! Form::textarea('detail', old('detail'), ['class' => 'form-control', 'id' => 'editor1']) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                {!! \App\Libs\SeoLib::adminSEOBox(\App\Models\News::class, !empty($seo) ? $seo : '') !!}
            </div>

            <div class="col-sm-3">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Thuộc tính bài viết
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
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

                        <div class="form-group">
                            {!! Form::label('news_category_id', 'Danh mục tin', ['class' => 'control-label']) !!}
                            {!! Form::select('news_category_id', ['' => 'Chọn danh mục'] + $listCategory, old('news_category_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_news_category_id"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('image', 'Ảnh đại diện', ['class' => 'control-label']) !!}
                            <div class="avatar_container text-center form-group {{ empty($record) ? 'hide' : '' }}">
                                <img src="{{ !empty($record) ? $record->image : '' }}" class="img_avatar img-responsive" />
                                {!! Form::hidden('image', old('image'), ['class' => 'input_avatar']) !!}
                            </div>
                            <div class="text-center">
                                <div class="btn btn-default btn_choose_avatar {{ !empty($record) ? 'hide' : '' }}">
                                    <i class="fa fa-image"></i> Click chọn ảnh đại diện
                                </div>
                                <div class="btn btn-danger btn_delete_avatar {{ empty($record) ? 'hide' : '' }}">
                                    <i class="fa fa-close"></i> Xóa ảnh đại diện
                                </div>
                            </div>
                            <span class="help-block text-red validation_error hide validation_avatar"></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="submit_fixed">
                <div class="content-wrapper text-center" style="background: #fff;">
                    <div class="col-sm-6">
                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i> {{ $pageTitle }}
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <!-- /.content -->

@endsection


@section('script')
    @include('admin.layouts.elements.ckeditor_script')
@endsection