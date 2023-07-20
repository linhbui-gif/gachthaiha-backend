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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada malesuada metus ut placerat. Cras a porttitor quam, eget ornare sapien. In sit amet vulputate metus. Nullam eget rutrum nisl. Sed tincidunt lorem sed maximus interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean scelerisque efficitur mauris nec tincidunt. Ut cursus leo mi, eu ultricies magna faucibus id.</p>
                                <blockquote class="blockquote_style3">
                                    <p>Integer is metus site turpis facilisis customers. elementum an mauris in venenatis consectetur east. Praesent condimentum bibendum Morbi sit amet commodo pellentesque at fringilla tincidunt risus.</p>
                                </blockquote>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="single_img">
                                            <img class="w-100 mb-4" src="assets/images/blog_single_img1.jpg" alt="blog_single_img1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="single_img">
                                            <img class="w-100 mb-4" src="assets/images/blog_single_img2.jpg" alt="blog_single_img2">
                                        </div>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi rhoncus laoreet tincidunt. Mauris interdum convallis metus. Suspendisse vel lacus est, sit amet tincidunt erat. Etiam purus sem, euismod eu vulputate eget, porta quis sapien. Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.</p>
                                <p>Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. Vestibulum eleifend nisl sed massa sagittis vestibulum. Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. Phasellus tristique cursus erat, a placerat tellus laoreet eget. Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis est rhoncus interdum a vitae velit.</p>
                                <div class="blog_post_footer">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-8 mb-3 mb-md-0">
                                            <div class="tags">
                                                <a href="#">General</a>
                                                <a href="#">Design</a>
                                                <a href="#">jQuery</a>
                                                <a href="#">Branding</a>
                                                <a href="#">Modern</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="social_icons text-md-right">
                                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post_navigation bg_gray">
                        <div class="row align-items-center justify-content-between p-4">
                            <div class="col-5">
                                <a href="#">
                                    <div class="post_nav post_nav_prev">
                                        <i class="ti-arrow-left"></i>
                                        <span>blanditiis praesentium</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="#" class="post_nav_home">
                                    <i class="ti-layout-grid2"></i>
                                </a>
                            </div>
                            <div class="col-5">
                                <a href="#">
                                    <div class="post_nav post_nav_next">
                                        <i class="ti-arrow-right"></i>
                                        <span>voluptatum deleniti</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card post_author">
                        <div class="card-body">
                            <div class="author_img">
                                <img src="assets/images/user1.jpg" alt="user1">
                            </div>
                            <div class="author_info">
                                <h6 class="author_name"><a href="#" class="mb-1 d-inline-block">Maria Redwood</a></h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                    <div class="related_post">
                        <div class="content_title">
                            <h5>Related posts</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog_post blog_style2 box_shadow1">
                                    <div class="blog_img">
                                        <a href="blog-single.html">
                                            <img src="assets/images/blog_small_img2.jpg" alt="blog_small_img2">
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide denounce</a></h5>
                                            <ul class="list_none blog_meta">
                                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                            </ul>
                                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog_post blog_style2 box_shadow1">
                                    <div class="blog_img">
                                        <a href="blog-single.html">
                                            <img src="assets/images/blog_small_img3.jpg" alt="blog_small_img3">
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <h5 class="blog_title"><a href="blog-single.html">Why is a ticket to Lagos so expensive?</a></h5>
                                            <ul class="list_none blog_meta">
                                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                            </ul>
                                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-area">
                        <div class="content_title">
                            <h5>(03) Comments</h5>
                        </div>
                        <ul class="list_none comment_list">
                            <li class="comment_info">
                                <div class="d-flex">
                                    <div class="comment_user">
                                        <img src="assets/images/user2.jpg" alt="user2">
                                    </div>
                                    <div class="comment_content">
                                        <div class="d-flex">
                                            <div class="meta_data">
                                                <h6><a href="#">Alden Smith</a></h6>
                                                <div class="comment-time">MARCH 5, 2018, 6:05 PM</div>
                                            </div>
                                            <div class="ml-auto">
                                                <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                            </div>
                                        </div>
                                        <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="comment_info">
                                        <div class="d-flex">
                                            <div class="comment_user">
                                                <img src="assets/images/user3.jpg" alt="user3">
                                            </div>
                                            <div class="comment_content">
                                                <div class="d-flex align-items-md-center">
                                                    <div class="meta_data">
                                                        <h6><a href="#">Daisy Lana</a></h6>
                                                        <div class="comment-time">april 8, 2018, 5:15 PM</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                                    </div>
                                                </div>
                                                <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment_info">
                                <div class="d-flex">
                                    <div class="comment_user">
                                        <img src="assets/images/user4.jpg" alt="user4">
                                    </div>
                                    <div class="comment_content">
                                        <div class="d-flex">
                                            <div class="meta_data">
                                                <h6><a href="#">John Becker</a></h6>
                                                <div class="comment-time">april 15, 2018, 10:30 PM</div>
                                            </div>
                                            <div class="ml-auto">
                                                <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                            </div>
                                        </div>
                                        <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="content_title">
                            <h5>Write a comment</h5>
                        </div>
                        <form class="field_form" name="enq" method="post">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input name="name" class="form-control" placeholder="Your Name" required="required" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <input name="email" class="form-control" placeholder="Your Email" required="required" type="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <input name="website" class="form-control" placeholder="Your Website" required="required" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea rows="3" name="message" class="form-control" placeholder="Your Comment" required="required"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button value="Submit" name="submit" class="btn btn-fill-out" title="Submit Your Message!" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
                    @include("web.news.sidebar")
                </div>
            </div>
        </div>
    </div>
@endsection