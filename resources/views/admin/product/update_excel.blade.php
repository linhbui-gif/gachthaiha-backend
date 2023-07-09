@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Cập nhật sản phẩm qua file excel';
@endphp
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open(['method' => 'POST', 'class' => 'frm_form_update_excel', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {{ $pageTitle }}
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('file', 'File excel	', ['class' => 'control-label']) !!}
                                    <span class="text-red" style="font-weight: 600">*</span>
                                    {!! Form::file('file', ['class' => 'form-control', 'id' => 'input_file']) !!}
                                    <span style="width: 100%; color: #666; font-style: italic">File excel phải đúng định dạng của file xuất tự mục danh sách sản phẩm</span>
                                    <span class="help-block text-red validation_error hide validation_name"></span>
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fa fa-save"></i> {{ $pageTitle }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <!-- /.content -->

@endsection


@section('script') 
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.frm_form_update_excel').submit(function (e) {
                e.preventDefault();
                var file_data = $('#input_file').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('_token', $('[name=_token]').val());
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    beforeSend: function(){
                        showPreload();
                    },
                    complete: function(){
                        hidePreload();
                    },
                    success: function(res){
                        if(res.success){
                            showNotify('success', res.message);
                        }else{
                            showNotify('error', res.message);
                        }
                    },
                    error: function(error){
                        showAjaxError(error);
                    }
                });
            });
        });
    </script>
@endsection