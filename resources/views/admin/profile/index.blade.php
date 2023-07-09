@extends('admin.layouts.layout')
<?php $pageTitle = 'Trang cá nhân'; ?>
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="background: white;border-top: 3px solid #d2d6de; margin: 10px 0">
            <div class="col-md-3 no-padding-right">
                <!-- Profile Image -->
                <div class="box box-primary" style="border-radius: 0;box-shadow: none;border: 0">
                    <div class="box-body box-profile">
                        <div class="img_profile">
                            <?php $avatar = !empty($user->avatar) ? $user->avatar : asset('assets/admin/dist/img/user2-160x160.jpg'); ?>
                            <img class="profile-user-img img-responsive img-circle" style="height: 100px; width: 100px; object-fit: cover; margin-left: auto; margin-right: auto;"
                                 src="<?php echo $avatar; ?>"
                                 alt="User profile picture">
                            <div class="btn_upload_avatar" id="edit_avatar"><i class="fa fa-camera"></i></div>
                            <input type="file" name="image" class="file_upload" id="input_edit_avatar_profile"
                                   style="display: none;"/>
                            <input type="hidden" class="upload_avatar_url"
                                   value="{{ route('admin.profile.update_avatar') }}"/>
                        </div>
                        <h3 class="profile-username text-center"><?php echo $user->name;?></h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item text-center" style="padding: 10px 0">
                                Nhóm quyền: {{ implode(', ', $user->roles()->pluck('name')->toArray()) }}
                            </li>
                            <style>
                                .list-group-item.active {
                                    background: #f2f2f2 !important;
                                    border: 0 !important;
                                }

                                .list-group-item {
                                    padding: 0;
                                }

                                .list-group-item a {
                                    color: #000000b3;
                                    padding: 10px 0;
                                    display: block;
                                }

                                .list-group-item.active a {
                                    font-weight: 600;

                                }
                            </style>
                            <li class="list-group-item text-center active">
                                <a href="#infomation" data-toggle="tab">Thông tin chung</a>
                            </li>
                            <li class="list-group-item text-center">
                                <a href="#update_password" data-toggle="tab">Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9 no-padding-left">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="active tab-pane" id="infomation">
                            <form name="frm_update_profile" class="frm_form_add" method="post"
                                  action="{{ route('admin.profile.update_avatar') }}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('email', 'Email đăng nhập', ['class' => 'control-label']) !!}
                                                <span class="text-red" style="font-weight: 600">*</span>
                                                {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'readonly' => 'readonly']) !!}
                                                <span class="help-block text-red validation_error hide validation_email"></span>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('name', 'Họ và tên', ['class' => 'control-label']) !!}
                                                <span class="text-red" style="font-weight: 600">*</span>
                                                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Họ và tên']) !!}
                                                <span class="help-block text-red validation_error hide validation_name"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-check"></i> Cập nhật
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="update_password">
                            <form name="frm_update_password" class="frm_form_add" method="post"
                                  action="{{ route('admin.profile.change_password') }}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('old_password', 'Mật khẩu hiện tại', ['class' => 'control-label']) !!}
                                        <span class="text-red" style="font-weight: 600">*</span>
                                        {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu hiện tại']) !!}
                                        <span class="help-block text-red validation_error hide validation_old_password"></span>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password', 'Mật khẩu mới', ['class' => 'control-label']) !!}
                                        <span class="text-red" style="font-weight: 600">*</span>
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu mới']) !!}
                                        <span class="help-block text-red validation_error hide validation_password"></span>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password_confirmation', 'Xác nhận mật khẩu mới', ['class' => 'control-label']) !!}
                                        <span class="text-red" style="font-weight: 600">*</span>
                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Xác nhận mật khẩu mới']) !!}
                                        <span class="help-block text-red validation_error hide validation_password_confirmation"></span>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-check"></i> Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
<script type="text/javascript" language="JavaScript">
    $(document).ready(function () {
        $('#edit_avatar').click(function(){
            $('#input_edit_avatar_profile').click();
        });

        $('#input_edit_avatar_profile').change(function(){
            var file_data = $(this).prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('_token', $('input[name=_token]').val());
            $.ajax({
                url: $('.upload_avatar_url').val(),
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
                        $('.profile-user-img').attr('src', res.images);
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