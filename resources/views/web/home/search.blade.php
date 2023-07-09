@extends('web.layouts.layout')
@section('title', 'Tìm kiếm')
@section('content')
    <div class="container">
        <div class="row">
            <div class="block_container">
                <div class="block_title text-uppercase">
                    Tin tức
                </div>
                <div class="block_content">
                    <div class="row">
                        @if(!$listNews->isEmpty())
                            @foreach($listNews as $key => $value)
                                <div class="col-sm-4">
                                    <?php $href = route('web.news.detail', ['link' => $value->link]); ?>
                                    <div class="news_box">
                                        <div class="news_image">
                                            <a href="{{ $href }}">
                                                <img src="{{ $value->image }}" alt="{{ $value->name }}"
                                                     class="img-responsive"
                                                     style="width: 580px; height: 248px; object-fit: cover"/>
                                            </a>
                                        </div>
                                        <div class="news_title">
                                            <a href="{{ $href }}">
                                                {{ $value->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                Không tìm thấy bài viết nào phù hợp
                            </div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="block_container" style="margin-bottom: 100px;">
                <div class="block_title text-uppercase">
                    Sản phẩm
                </div>
                <div class="block_content">
                    <div class="row">
                        @if(!$listProduct->isEmpty())
                            @foreach($listProduct as $key => $value)
                                <div class="col-sm-4">
                                    <?php $href = route('web.product.detail', ['link' => $value->link]); ?>
                                    <div class="news_box">
                                        <div class="news_image">
                                            <a href="{{ $href }}">
                                                <img src="{{ $value->image }}" alt="{{ $value->name }}"
                                                     class="img-responsive"
                                                     style="width: 580px; height: 248px; object-fit: cover"/>
                                            </a>
                                        </div>
                                        <div class="news_title">
                                            <a href="{{ $href }}">
                                                {{ $value->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                Không tìm thấy sản phẩm nào phù hợp
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection