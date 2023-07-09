@extends('admin.layouts.login')
<?php $pageTitle = 'Đăng nhập vào hệ thống'; ?>
@section('title', $pageTitle)
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/">
                <img src="{{ asset('assets/admin/dist/img/logo.png') }}" style="width: 200px; height: 80px; object-fit: contain;"/>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ $pageTitle }}</p>
            {!! Form::open(['method' => 'POST', 'class' => 'frm_login']) !!}

            @if (\Illuminate\Support\Facades\Request::has('previous'))
                <input type="hidden" name="previous" value="{{ \Illuminate\Support\Facades\Request::get('previous') }}">
            @else
                <input type="hidden" name="previous" value="{{ \Illuminate\Support\Facades\URL::previous() }}">
            @endif

            <div class="form-group has-feedback">
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}

            @if (\Illuminate\Support\Facades\Route::has('admin.password.request'))
                <a href="{{ route('admin.password.request') }}">
                    {{ __('Quên mật khẩu?') }}
                </a>
            @endif

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection