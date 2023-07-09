@extends('admin.layouts.login')
<?php $pageTitle = 'Quên mật khẩu'; ?>
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
            <form method="POST" action="{{ route('admin.password.email') }}">
                {{ csrf_field() }}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
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
                <div class="row text-center">
                    <button type="submit" class="btn btn-primary">Gửi link lấy lại mật khẩu</button>
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
