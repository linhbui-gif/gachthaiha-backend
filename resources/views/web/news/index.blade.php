@extends('web.layouts.layout')
@section('title', 'Tin tức')
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        "Tin tức",
    ]
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => "Tin tức"])
    <div class="section">
        <div class="container">
            <div class="row">
                @if(!empty($listNews))
                    @foreach($listNews as $key => $value)
                        @php
                            $href = route('web.news.detail', ['link' => $value->link]);
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            @include('web.components.news.new-item',['value' => $value])
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-12 mt-2 mt-md-4">
                    @if(!empty($listNews))
                        {{ $listNews->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection