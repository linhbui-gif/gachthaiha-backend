@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới tài khoản quản trị';
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
                            {!! Form::label('name', 'Họ và tên', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Họ và tên']) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email đăng nhập', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email đăng nhập']) !!}
                            <span class="help-block text-red validation_error hide validation_email"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Mật khẩu', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu']) !!}
                            <span class="help-block text-red validation_error hide validation_password"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Nhập lại mật khẩu', ['class' => 'control-label']) !!}
                            <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Mật khẩu']) !!}
                            <span class="help-block text-red validation_error hide validation_password_confirmation"></span>
                        </div>
                        <div class="form-group">
                            @php
                                $status = array(
                                    \App\Models\BaseModel::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\BaseModel::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp

                            {!! Form::label('status', trans('admin.status'), ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            {!! Form::select('status', $status, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('avatar', 'Ảnh đại diện', ['class' => 'control-label']) !!}
                            <div class="input-group">
                                {!! Form::text('avatar', old('avatar'), ['id' => 'input_avatar', 'class' => 'form-control',
                                    'placeholder' => 'Ảnh đại diện']) !!}
                                <div class="input-group-btn">
                                    <div class="btn btn-primary btn-upload-file"
                                         onclick="selectFileWithCKFinder('input_avatar');">
                                        <i class="fa fa-image"></i> {{ trans('admin.select_image') }}
                                    </div>
                                </div>
                            </div>
                            <span class="help-block text-red validation_error hide validation_avatar"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('role', 'Phân quyền', ['class' => 'control-label']) !!}
                            <span class="text-red" style="font-weight: 600">*</span>
                            <div class="row">
                                <?php
                                $userRole = [];
                                if (!empty($record)) {
                                    $userRole = $record->getRoleNames();
                                    if (!$userRole->isEmpty()) {
                                        $userRole = $userRole->toArray();
                                    } else {
                                        $userRole = [];
                                    }
                                }
                                ?>
                                @if(!empty($listRole))
                                    @foreach($listRole as $key => $value)
                                        <div class="col-sm-3">
                                            <label style="cursor: pointer;">
                                                <input type="checkbox" name="role[{{ $value->id }}]"
                                                       value="{{ $value->name }}"
                                                        {{ in_array($value->name, $userRole) ? 'checked' : '' }} />
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <span class="help-block text-red validation_error hide validation_status"></span>
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
    @include('admin.layouts.elements.ckeditor_script')
@endsection