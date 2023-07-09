@extends('admin.layouts.layout')
@section('title', 'Thông báo của bạn')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thông báo của bạn
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title" style="float: left;">
                    Danh sách
                </h3>

                <label class="label label-primary notify_make_all_read" style="float: left; margin-left: 10px;" data-url="{{ route('admin.notify.make_all_read') }}">
                    Đánh dấu tất cả là đã đọc
                </label>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked" style="border-bottom: solid 1px #f1f1f1;">
                    <?php
                    if(!empty($listData)){
                    foreach($listData as $key => $value){
                    $data = $value['data'];
                    switch($data['level']){
                        case 'info':
                            $textColor = 'text-info';
                            break;
                        case 'warning':
                            $textColor = 'text-warning';
                            break;
                        case 'danger':
                            $textColor = 'text-danger';
                            break;
                        case 'success':
                            $textColor = 'text-success';
                            break;
                        case 'primary':
                            $textColor = 'text-primary';
                            break;
                        default:
                            $textColor = 'text-default';
                            break;
                    }
                    ?>
                    <li>
                        <a href="{{ !empty($data['url']) ? $data['url'] : '#' }}" class="<?php echo $value->unread() ? 'notify_unread a_make_read' : 'notify_read'; ?>" data-notify-id="{{ $value->id }}">
                            <div class="notify_text_message pull-left">
                                <i class="fa {{ !empty($data['icon']) ? $data['icon'] : 'fa-info-circle' }} {{ $textColor }}"></i> {{ !empty($data['message']) ? $data['message'] : '#' }}
                            </div>
                            <div class="notify_time pull-right"><?php echo date('H:i d/m/Y', strtotime($value->created_at)); ?></div>
                            <span class="clearfix"></span>
                        </a>
                    </li>
                    <?php
                    }
                    }
                    ?>
                </ul>

                <div class="form-group text-center center-block">
                    <?php if(!empty($listData)){
                        echo $listData->links();
                    }
                    ?>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->

@endsection