@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới cài đặt';
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
                            {!! Form::label('setting_key', 'Key', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('setting_key', old('setting_key'), ['class' => 'form-control', 'placeholder' => 'Key']) !!}
                            <span class="help-block text-red validation_error hide validation_setting_key"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Loại dữ liệu', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::select('type', \App\Models\Setting::$inputType, old('type'), ['class' => 'form-control select2 select_input_type']) !!}
                            <span class="help-block text-red validation_error hide validation_type"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('setting_value', 'Value', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            <div class="setting_by_type">
                                @if(!empty($record))
                                    @if($record->type == \App\Models\Setting::INPUT_TEXT)
                                        {!! Form::text('setting_value', old('setting_value'), ['class' => 'form-control', 'placeholder' => 'Value']) !!}
                                    @elseif($record->type == \App\Models\Setting::INPUT_TEXTAREA)
                                        {!! Form::textarea('setting_value', old('setting_value'), ['class' => 'form-control', 'placeholder' => 'Value']) !!}
                                    @elseif($record->type == \App\Models\Setting::INPUT_IMAGE)
                                        <div class="input-group">
                                            {!! Form::text('setting_value', old('setting_value'), ['class' => 'form-control', 'id' => 'partner_image', 'placeholder' => 'Ảnh']) !!}
                                            <div class="input-group-btn">
                                                <div class="btn btn-primary btn-upload-file"
                                                     onclick="selectFileWithCKFinder('partner_image');">
                                                    <i class="fa fa-image"></i> {{ trans('admin.select_image') }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        {!! Form::textarea('setting_value', old('setting_value'), ['class' => 'form-control', 'id' => 'editor1', 'placeholder' => 'Value']) !!}
                                    @endif
                                @else
                                    {!! Form::text('setting_value', old('setting_value'), ['class' => 'form-control', 'placeholder' => 'Value']) !!}
                                @endif
                            </div>
                            <span class="help-block text-red validation_error hide validation_setting_value"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-striped">
                            <tr>
                                <th colspan="3">Các key có sẵn</th>
                            </tr>
                            <tr>
                                <th>STT</th>
                                <th>Tên key</th>
                                <th>Giải nghĩa</th>
                            </tr>
                            <?php
                            $listKey = \App\Models\Setting::$listKey;
                            $count = 0;
                            ?>
                            @if(!empty($listKey))
                                @foreach($listKey as $key => $value)
                                    <?php $count ++; ?>
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $key }}</td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
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

@section('script')
    @include('admin.layouts.elements.ckeditor_script')

    <script type="text/javascript" language="JavaScript">
        $(document).ready(function(){
            $('.select_input_type').change(function(){
                var html = '';
                var data = $('.setting_by_type .form-control').val();
                if($(this).val() == '{{ \App\Models\Setting::INPUT_TEXT }}'){
                    html = `
                    {!! Form::text('setting_value', '${data}', ['class' => 'form-control', 'placeholder' => 'Value']) !!}
                    `;
                    $('.setting_by_type').html(html);
                }else if($(this).val() == '{{ \App\Models\Setting::INPUT_TEXTAREA }}'){
                    html = `
                    {!! Form::textarea('setting_value', '${data}', ['class' => 'form-control', 'placeholder' => 'Value']) !!}
                    `;
                    $('.setting_by_type').html(html);
                }else if($(this).val() == '{{ \App\Models\Setting::INPUT_IMAGE }}'){
                    html = `
                    <div class="input-group">
                        {!! Form::text('setting_value', '${data}', ['class' => 'form-control', 'id' => 'partner_image', 'placeholder' => 'Ảnh']) !!}
                        <div class="input-group-btn">
                            <div class="btn btn-primary btn-upload-file"
                                 onclick="selectFileWithCKFinder('partner_image');">
                                <i class="fa fa-image"></i> {{ trans('admin.select_image') }}
                            </div>
                        </div>
                    </div>
                    `;
                    $('.setting_by_type').html(html);
                }else if($(this).val() == '{{ \App\Models\Setting::INPUT_EDITOR }}'){
                    html = `
                    {!! Form::textarea('setting_value', '${data}', ['class' => 'form-control', 'id' => 'editor1', 'placeholder' => 'Value']) !!}
                    `;
                    $('.setting_by_type').html(html);
                    CKEDITOR.replace( 'editor1', setupCKFinder);
                }
            });
        });
    </script>
@endsection