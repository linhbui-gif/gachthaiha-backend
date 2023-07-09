@extends('web.layouts.layout')
@section('title', $page->name)
@section('content')
    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">Giới thiệu</p>
            </div>
        </div>
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 a-left">
                        <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                            <li class="home">
                                <a itemprop="url" href="/" ><span itemprop="title">Trang chủ</span></a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>

                            <li><strong ><span itemprop="title">Giới thiệu</span></strong></li>


                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page_title">
                        <h1 class="title_page_h1">Giới thiệu
                        </h1>
                    </div>
                    <div class="content-page rte">
                        <p>Trang giới thiệu giúp khách hàng hiểu rõ hơn về cửa hàng của bạn. Hãy cung cấp thông tin cụ thể về việc kinh doanh, về cửa hàng, thông tin liên hệ. Điều này sẽ giúp khách hàng cảm thấy tin tưởng khi mua hàng trên website của bạn.</p><p>Một vài gợi ý cho nội dung trang Giới thiệu:</p><div><ul><li><span>Bạn là ai</span><br></li><li><span>Giá trị kinh doanh của bạn là gì</span><br></li><li><span>Địa chỉ cửa hàng</span><br></li><li><span>Bạn đã kinh doanh trong ngành hàng này bao lâu rồi</span><br></li><li><span>Bạn kinh doanh ngành hàng online được bao lâu</span><br></li><li><span>Đội ngũ của bạn gồm những ai</span><br></li><li><span>Thông tin liên hệ</span><br></li><li><span>Liên kết đến các trang mạng xã hội (Twitter, Facebook)</span><br></li></ul></div><p>Bạn có thể chỉnh sửa hoặc xoá bài viết này tại <a href='https://dl-enador.myharavan.com/admin/page#/detail/1000698442'><strong>đây</strong></a> hoặc thêm những bài viết mới trong phần quản lý <a href='https://dl-enador.myharavan.com/admin/page#/new'><strong>Trang nội dung</strong></a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php /* ?>

    <section id="stBlog">
        <div class="stBreadcrumb ">
            <div class="banner-breadcrumb">
                <h2>{{ $page->name }}</h2>
                <ul>
                    <li><a href="/" target="_self">Trang chủ</a></li>
                    <li class="active"><span>{{ $page->name }}</span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12 col-md-push-3 col-sm-push-4">
                    <div class="blog-detail-page">
                        <div class="big-thumb">
                            <h2>{{ $page->name }}</h2>
                        </div>
                        <div class="small-thumb">
                            {!! $page->detail !!}
                        </div>
                        <div class="social-share">
                            <div class="share-b">
                                <b>share :</b>
                                <ul>
                                    <li>
                                        <a target="_blank"
                                           href="//www.facebook.com/sharer.php?u={{ url()->current() }}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank"
                                           href="//twitter.com/share?text={{ $page->name }}&url={{ url()->current() }}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank"
                                           href="//pinterest.com/pin/create/button/?url={{ url()->current() }}">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank"
                                           href="//plus.google.com/share?url={{ url()->current() }}"
                                           class="share-google">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 col-md-pull-9 col-sm-pull-8">
                    <aside id="insBlogSidebar">
                        <div class="right_sidebar box_sidebar">
                            <div class="all_right_widgets">
                                <div class="sing_right_widget">
                                    <h2>Các trang liên quan</h2>
                                    <div class="block_content">
                                        <!-- layered -->
                                        <div class="layered layered-category">
                                            <div class="layered-content">
                                                <ul class="tree-menu notStyle">
                                                    @foreach($relatePage as $key => $value)
                                                        <li class="">
                                                            <span></span>
                                                            <a class="" href="{{ route('web.page.detail', ['link' => $value->link]) }}" title="{{ $value->name }}"
                                                               target="_self">
                                                                {{ $value->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- ./layered -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <?php */ ?>

@endsection