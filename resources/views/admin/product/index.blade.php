@extends('admin.layouts.layout')
<?php $pageTitle = 'Sản phẩm'; ?>
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $pageTitle }}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {{ trans('admin.filter_data') }}
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['method' => 'POST', 'class' => 'frm_form_search']) !!}
                {!! Form::hidden('page', 1, ['id' => 'page']) !!}
                {!! Form::hidden('limit', 10, ['id' => 'limit', 'class' => 'input_limit']) !!}
                {!! Form::hidden('order', 'DESC', ['id' => 'order', 'class' => 'input_order']) !!}
                {!! Form::hidden('order_by', 'products.id', ['id' => 'order_by', 'class' => 'input_order_by']) !!}
                {!! Form::hidden('submit_type', 'search', ['id' => 'submit_type']) !!}
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên sản phẩm', ['class' => 'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên sản phẩm']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('category_id', 'Danh mục sản phẩm', ['class' => 'control-label']) !!}
                            {!! Form::select('category_id', ['' => 'Chọn danh mục'] + $listCategory, old('category_id'), ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('type_id', 'Loại gạch', ['class' => 'control-label']) !!}
                            {!! Form::select('type_id', ['' => 'Chọn loại'] + $listType, old('type_id'), ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('size_id', 'Kích thước', ['class' => 'control-label']) !!}
                            {!! Form::select('size_id', ['' => 'Chọn kích thước'] + $listSize, old('size_id'), ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('surface_id', 'Bề mặt gạch', ['class' => 'control-label']) !!}
                            {!! Form::select('surface_id', ['' => 'Chọn bề mặt'] + $listSurface, old('surface_id'), ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('brand_id', 'Thương hiệu', ['class' => 'control-label']) !!}
                            {!! Form::select('brand_id', ['' => 'Chọn thương hiệu'] + $listBrand, old('brand_id'), ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            @php
                                $status = array(
                                    \App\Models\BaseModel::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\BaseModel::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp
                            {!! Form::select('status', ['' => 'Chọn trạng thái'] + $status, old('status'), ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            {!! Form::button('<i class="fa fa-search"></i> Lọc dữ liệu', ['type' => 'submit', 'class' => 'btn btn-warning btn_submit', 'data-type' => 'search']) !!}
{{--                            {!! Form::button('<i class="fa fa-file-excel-o"></i> Xuất excel', ['type' => 'submit', 'class' => 'btn btn-primary btn_submit', 'data-type' => 'excel']) !!}--}}
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6 text-right">
                        <div class="form-group">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
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
                    {{ 'Danh sách' }}
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
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

@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            // $('.frm_form_search_product').submit(function (e) {
            //     e.preventDefault();
            //     $.ajax({
            //         url: $(this).attr('action'),
            //         type: 'post',
            //         dataType: 'json',
            //         data: $(this).serialize(),
            //         beforeSend: function () {
            //             showPreload();
            //         },
            //         complete: function () {
            //             hidePreload();
            //         },
            //         success: function (res) {
            //             if (res.success) {
            //                 if(typeof res.html != "undefined"){
            //                     $('.show_ajax_data').html(res.html);
            //                 }
            //
            //                 if (typeof res.url != "undefined") {
            //                     window.location = res.url;
            //                 }
            //             } else {
            //                 showNotify('error', res.message);
            //             }
            //             $(document).trigger('icheck');
            //             $('[data-toggle=tooltip]').tooltip();
            //             $('.select2').select2();
            //         },
            //         error: function (error) {
            //             showAjaxError(error);
            //         }
            //     });
            // });

            $('.btn_submit').click(function (e) {
                e.preventDefault();
                $('#submit_type').val($(this).attr('data-type'));
                $('.frm_form_search').submit();
            });

            $('.frm_form_search').submit();

            $(document).on('click', '.btn_update', function(){
                var ID = $(this).attr('data-id');
                var FIELD = $(this).attr('data-type');
                var DATA = $('.input_'+FIELD+'_'+ID).val();
                $.ajax({
                    url: '{{ route('admin.product.update_price') }}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id: ID,
                        field: FIELD,
                        data: DATA,
                        _token: $('[name=_token]').val()
                    },
                    beforeSend: function(){
                        showPreload();
                    },
                    complete: function(){
                        hidePreload();
                    },
                    success: function(res){
                        if(res.success){
                            $('.'+FIELD+'_'+ID).text(res.price);
                            $('.input_'+FIELD+'_'+ID).val('');
                        }else{
                            showNotify('error', res.message);
                        }
                    },
                    error: function(error){
                        showAjaxError(error);
                    }
                });
            });

            $(document).on('keypress', '.input_update_price', function(e){
                if(e.keyCode == 13){
                    e.preventDefault();
                    $(this).parent().find('.btn_update').click();
                }
            });
        });
    </script>
@endsection