@extends('web.layouts.layout')
@section('title', 'Tin tức')
@section('content')

    <div class="breadcrumb_background">
        <div class="title_full">
            <div class="container a-center">
                <p class="title_page_breadcrumb">Tin tức</p>
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
                            <li><strong><span itemprop="title">Tin tức</span></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <section class="blog_page_section">
        <div class="container  margin-bottom-50">
            <div class="row">
                <section class="right-content col-lg-9 col-md-9 col-sm-12 col-lg-push-3 col-md-push-3">
                    <div class="page_title">
                        <h1 class="title_page_h1">Tin tức</h1>
                    </div>
                    <section class="list-blogs blog-main page-blog">
                        <div class="row">
                            @if(!empty($listNews))
                                @foreach($listNews as $key => $value)
                                    @php
                                        $href = route('web.news.detail', ['link' => $value->link]);
                                    @endphp
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="blog_full margin-bottom-25 ">
                                            <div class="blog-inner">
                                                <div class="blog-img section margin-bottom-15">
                                                    <a href="{{ $href }}">
                                                        <img src="{{ $value->image }}"
                                                             data-lazyload="{{ $value->image }}"
                                                             style="max-width:100%;" class="img-responsive"
                                                             alt="{{ $value->name }}">
                                                    </a>
                                                </div>
                                                <div class="content_blog_full section margin-bottom-15">
                                                    <h3>
                                                        <a title="{{ $value->name }}"
                                                           href="{{ $href }}">{{ $value->name }}</a>
                                                    </h3>
                                                    <span class="time_post f"><i class="fa fa-clock-o"></i>&nbsp; Thứ Th 2, 26/11/2018</span>

                                                    <div class="blog-description">
                                                        <p class="text3line">
                                                            {{ $value->description }}
                                                        </p>
                                                        <a class="button_custome_35"
                                                           href="{{ $href }}"
                                                           title="Đọc tiếp">Đọc tiếp</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="text-xs-right col-lg-12 col-sm-12 col-xs-12 col-md-12">
                                <nav>
                                    @if(!empty($listNews))
                                        {{ $listNews->links() }}
                                    @endif
                                </nav>

                            </div>
                        </div>
                    </section>

                </section>
                <aside class="left left-content col-xs-12 col-lg-3 col-md-3 col-sm-12 col-lg-pull-9 col-md-pull-9">
                    @include('web.news.sidebar')
                </aside>
            </div>
        </div>
    </section>

@endsection