@extends('admin.layouts.login')
<?php $pageTitle = 'Reset mật khẩu'; ?>
@section('title', $pageTitle)
@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="/">
                <img src="{{ asset('assets/admin/dist/img/logo.png') }}"
                     style="width: 200px; height: 80px; object-fit: contain;"/>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ $pageTitle }}</p>
            <form method="POST" action="{{ route('admin.password.update') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group has-feedback">
                    <label>Email</label>
                    {!! Form::email('email', $email ?? old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback text-red" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <label>Mật khẩu mới</label>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu mới']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback text-red" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <label>Xác nhận mật khẩu mới</label>
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Xác nhận mật khẩu mới']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback text-red" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row text-center">
                    <button type="submit" class="btn btn-primary">Reset mật khẩu</button>
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
