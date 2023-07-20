@extends('web.layouts.layout')
@section('title', $news->name)
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        "Chi tiết tin tức",
        $news->name
    ]
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => $news->name])
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="single_post">
                        <h2 class="blog_title">{{$news->name}}</h2>
                        <ul class="list_none blog_meta">
                            <li><a href="#"><i class="ti-calendar"></i> {{$news->created_at->format('d/m/y')}}</a></li>
                            <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                        </ul>
                        <div class="blog_img">
                            <img src="{{$news->image}}" alt="{{$news->name}}">
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                {!! $news->detail !!}
                            </div>
                        </div>
                    </div>
{{--                    <div class="related_post">--}}
{{--                        <div class="content_title">--}}
{{--                            <h5>Related posts</h5>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="blog_post blog_style2 box_shadow1">--}}
{{--                                    <div class="blog_img">--}}
{{--                                        <a href="blog-single.html">--}}
{{--                                            <img src="assets/images/blog_small_img2.jpg" alt="blog_small_img2">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="blog_content bg-white">--}}
{{--                                        <div class="blog_text">--}}
{{--                                            <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide denounce</a></h5>--}}
{{--                                            <ul class="list_none blog_meta">--}}
{{--                                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>--}}
{{--                                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="blog_post blog_style2 box_shadow1">--}}
{{--                                    <div class="blog_img">--}}
{{--                                        <a href="blog-single.html">--}}
{{--                                            <img src="assets/images/blog_small_img3.jpg" alt="blog_small_img3">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="blog_content bg-white">--}}
{{--                                        <div class="blog_text">--}}
{{--                                            <h5 class="blog_title"><a href="blog-single.html">Why is a ticket to Lagos so expensive?</a></h5>--}}
{{--                                            <ul class="list_none blog_meta">--}}
{{--                                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>--}}
{{--                                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
                    @include("web.news.sidebar")
                </div>
            </div>
        </div>
    </div>
@endsection