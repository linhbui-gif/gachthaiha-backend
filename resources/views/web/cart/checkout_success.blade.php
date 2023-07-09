@extends('web.layouts.layout')
@section('title', 'Đặt hàng thành công')
@section('content')
    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">Đặt hàng thành công</p>
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
                            <li><strong><span itemprop="title">Đặt hàng thành công</span></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container" style="margin-bottom: 100px">
        <div class="block_container">
            <div class="block_title text-uppercase text-center">
                Đặt hàng thành công
            </div>
            <div class="block_content">
                <div class="text-center">
                    <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ kiểm tra ngay. Xin cảm ơn.</p>
                    <a class="btn_submit_contact" style="display: inline-block;" href="/">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
