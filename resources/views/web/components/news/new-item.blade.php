@php
    $href = route('web.news.detail', ['link' => $value->link]);
@endphp
<div class="blog_post blog_style1 box_shadow1">
    <div class="blog_img"><a href="{{$href}}"><img src="{{ $value->image }}" alt="{{ $value->name }}" /></a></div>
    <div class="blog_content bg-white">
        <div class="blog_text">
            <h5 class="blog_title"><a href="{{$href}}l">{{ $value->name }}</a></h5>
            <ul class="list_none blog_meta">
                <li><a href="#"><i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($value->created_at)) }}</a></li>
{{--                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>--}}
            </ul>
            {!! $value->description !!}
        </div>
    </div>
</div>