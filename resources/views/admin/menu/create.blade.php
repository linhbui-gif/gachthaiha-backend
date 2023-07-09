@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới menu';
@endphp
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php /* ?>

        <div class="row">
            <div class="col-sm-4">

                @include('admin.common.menu.tab.news')


                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tour</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body"></div>
                </div>

                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Điểm đến</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;"></div>
                </div>

                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Trang</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;"></div>
                </div>

            </div>
            <div class="col-sm-8">

            </div>
        </div>

        <?php */ ?>

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
                            {!! Form::label('name', 'Tên menu', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên menu']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('position', 'Vị trí', ['class' => 'control-label']) !!}
                            {!! Form::select('position', ['' => 'Chọn vị trí'] + \App\Models\Menu::$listPosition, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_position"></span>
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
                        <h4>Danh sách menu</h4>
                        <hr/>
                        <div class="list_menu_item_container">
                            @if(!empty($record))
                                @php $detail = $record->detail; @endphp
                            @endif
                            @include('admin.menu.template.menu_detail')
                        </div>
                        <div class="btn btn-warning new_menu_item"><i class="fa fa-plus"></i> {{ trans('admin.add') }}
                        </div>
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
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $(document).on('click', '.new_menu_item', function () {
                let randomKey = parseInt($('.menu-item-count').length) + 1;
                let html = ({}) => `
                    @include('admin.menu.template.menu_detail_js')
                    `;
                $('.list_menu_item_container').append(html);
                $('[data-toggle=tooltip]').tooltip();
            });

            $(document).on('click', '.btn-rm-menu-item', function () {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection