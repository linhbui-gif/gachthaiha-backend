@extends('admin.layouts.layout')
@section('title', 'Loại sản phẩm')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Loại sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> {{ trans('admin.home') }}</a></li>
            <li class="active">{{ trans('admin.product_category') }}</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {{ trans('admin.filter_data') }}
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['method' => 'POST', 'class' => 'frm_form_search']) !!}
                {!! Form::hidden('page', 1, ['id' => 'page']) !!}
                {!! Form::hidden('order', 'DESC', ['id' => 'order', 'class' => 'input_order']) !!}
                {!! Form::hidden('order_by', 'product_types.id', ['id' => 'order_by', 'class' => 'input_order_by']) !!}
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">{{ trans('admin.name') }}</label>
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="form-group">
                            {!! Form::button('<i class="fa fa-search"></i> Lọc dữ liệu', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-6 text-right">
                        <div class="form-group">
                            <a href="{{ route('admin.product_type.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> {{ trans('admin.add') }}
                            </a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {{ trans('admin.list') }}
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="show_ajax_data"></div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
