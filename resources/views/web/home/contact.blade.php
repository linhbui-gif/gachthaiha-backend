@extends('web.layouts.layout')
@section('title', 'Liên hệ')
@section('content')

    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">Liên hệ</p>
            </div>
        </div>
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 a-left">
                        <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                            <li class="home">
                                <a itemprop="url" href="/"><span itemprop="title">Trang chủ</span></a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>

                            <li><strong><span itemprop="title">Liên hệ</span></strong></li>


                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="margin-bottom-60 margin-top-30">
        <div class="wrap_">

            <div class="section_maps">
                <div class="container">
                    <div class="template-contact row">
                        <div class="col-lg-12 col-md-12 col-xs-12 contact">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="google-map margin-bottom-30">

                                        <div id="contact_map" class="map">
                                            {!! \App\Libs\WebLib::getSetting(\App\Models\Setting::MAP_IFRAME) !!}
                                        </div>

                                    </div>
                                </div>
                                <section class="sectioncontact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <form id="contact-us" class="contact-form" method="post" action="">
                                                    {{ csrf_field() }}
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h2>Gửi yêu cầu cho chúng tôi</h2>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        {!! Form::text('name', old('name'), ['class' => 'input-control', 'placeholder' => 'VD: Nguyen Van A']) !!}
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        {!! Form::text('phone', old('phone'), ['class' => 'input-control', 'placeholder' => 'Nhập số điện thoại']) !!}
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        {!! Form::textarea('content', old('content'), ['class' => 'input-control', 'placeholder' => 'Nội dung', 'rows' => 4, 'cols' => 5]) !!}
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                                                        <button type="submit" class="button_custome_35">Gửi liên hệ
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="t_contact max991px">
                                                <h1>Thông tin liên hệ</h1>
                                                <p class="p"></p>
                                                <span class="span">{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOME_SEO_DESCRIPTION) }}</span>
                                                <ul class="margin-bottom-15">
                                                    <li>
                                                        <span class="block_fonticon"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                        <span class="title_li"><b>Địa chỉ:</b> {{ \App\Libs\WebLib::getSetting(\App\Models\Setting::ADDRESS) }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="block_fonticon"><i class="fa fa-phone"></i></span>
                                                        <span class="title_li">
                                                                <b>Hotline:</b>
                                                                <a class="fone"
                                                                   href="tel:{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}">
                                                                    {{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}
                                                                </a>
                                                            </span>
                                                    </li>
                                                    <li>
                                                        <span class="block_fonticon"><i
                                                                    class="fa fa-envelope"></i></span>
                                                        <span class="title_li">
                                                                <b>Email:</b>
                                                                <a href="mailto:{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::EMAIL) }}">
                                                                    {{ \App\Libs\WebLib::getSetting(\App\Models\Setting::EMAIL) }}
                                                                </a>
                                                            </span>
                                                    </li>
                                                    <li>
                                                        <span class="block_fonticon"><i class="fa fa-globe"></i></span>
                                                        <span class="title_li"><b>Website:</b> <span>{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::WEBSITE) }}</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('#contact-us').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    beforeSend: function () {
                        showPreload();
                    },
                    complete: function () {
                        hidePreload();
                    },
                    success: function (res) {
                        if (res.success) {
                            alert('Gửi yêu cầu liên hệ thành công');
                            $('.form-control').val('');
                        } else {
                            alert(res.message);
                        }
                    },
                    error: function () {
                        alert('Có lỗi trong quá trình xử lý. Mời bạn thử lại');
                    }
                });
            });
        });

        function showPreload() {
            $('.overlay').removeClass('hide');
        }

        function hidePreload() {
            $('.overlay').addClass('hide');
        }
    </script>
@endsection