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
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('name', trans('admin.banner_name'), ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', $banner->name, ['class' => 'form-control', 'placeholder' => trans('admin.banner_name')]) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
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
                            {!! Form::select('status', $status, $banner->status, ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <h4>{{ trans('admin.list_image') }}</h4>
                        <hr/>
                        <div class="list_banner_container">
                            @php $detail = $banner->detail; @endphp
                            @include('admin.common.banner.template.banner_detail')
                        </div>

                        <a href="{{ route('admin.banner.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> {{ trans('admin.return') }}</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection


@section('before_script')

@endsection

@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.form-control').prop('disabled', 'disabled');
        });
    </script>
@endsection