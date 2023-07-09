@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : trans('admin.add_banner');
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
                @if(!empty($banner))
                    {!! Form::model($banner, ['method' => 'POST', 'class' => 'frm_form_add']) !!}
                @else
                    {!! Form::open(['method' => 'POST', 'class' => 'frm_form_add']) !!}
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('name', trans('admin.banner_name'), ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('admin.banner_name')]) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('position', trans('admin.position'), ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <?php
                            $position = ['' => 'Chọn vị trí'] + \App\Models\Banner::$listPosition;
                            ?>
                            {!! Form::select('position', $position, old('position'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_position"></span>
                        </div>

                        <div class="form-group">
                            @php
                                $status = array(
                                    \App\Models\Banner::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\Banner::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp

                            {!! Form::label('status', trans('admin.status'), ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::select('status', $status, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <h4>{{ trans('admin.list_image') }}</h4>
                        <hr/>
                        <div class="list_banner_container">
                            @if(!empty($banner))
                                @php $detail = $banner->detail; @endphp
                            @endif
                            @include('admin.banner.template.banner_detail')
                        </div>
                        <div class="btn btn-warning new_banner"><i class="fa fa-plus"></i> {{ trans('admin.add') }}
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


@section('before_script')

@endsection

@section('script')
    @include('admin.layouts.elements.ckeditor_script')

    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $(document).on('click', '.new_banner', function () {
                let randomKey = parseInt($('.banner-count').length) + 1;
                let html = ({}) => `
                    @include('admin.banner.template.banner_detail_js')
                    `;
                $('.list_banner_container').append(html);
                $('[data-toggle=tooltip]').tooltip();
            });
        });
    </script>
@endsection