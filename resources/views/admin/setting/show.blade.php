@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới nơi khởi hành';
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
                            {!! Form::label('name', 'Tên nơi khởi hành', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên nơi khởi hành']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Danh mục cha', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            <?php
                            $listParent = !empty($listParent) ? ['' => 'Chọn danh mục cha'] + $listParent : []
                            ?>
                            {!! Form::select('parent_id', $listParent,
                                old('parent_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_parent_id"></span>
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
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.form-control').prop('disabled', 'disabled');
        });
    </script>
@endsection