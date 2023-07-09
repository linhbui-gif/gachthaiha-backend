@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới nhóm quyền';
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
                            {!! Form::label('name', 'Tên nhóm quyền', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Tên nhóm quyền']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('permission', 'Gán quyền', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="row">
                                <?php
                                $rolePermission = [];
                                if (!empty($record)) {
                                    $rolePermission = $record->permissions()->pluck('name')->toArray();
                                }
                                ?>
                                @if(!empty($listPermission))
                                    @foreach($listPermission as $key => $value)
                                        <div class="col-sm-12">
                                            <label class="text-uppercase">
                                                <strong><i><u>{{ trans('permissions.'.$key.'.name') }}</u></i></strong>
                                            </label>
                                        </div>
                                        @foreach($value as $k => $v)
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label style="cursor: pointer;">
                                                        <input type="checkbox" name="permission[{{ $key.'_'.$k }}]"
                                                               value="{{ $v}}"
                                                                {{ in_array($v, $rolePermission) ? 'checked' : '' }}/>
                                                        {{ trans('permissions.'.$v) }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    @endforeach
                                @endif
                            </div>
                            <span class="help-block text-red validation_error hide validation_permission"></span>
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