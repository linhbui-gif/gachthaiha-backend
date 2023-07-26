@extends('web.layouts.layout')
@section('title', $page->name)
@section('seo')
    @include('web.elements.seo',[
    'title' => $page->name,
    'description' => $page->detail,
    'keyword' => $page->name ?? ''
    ])
@endsection
@section('content')
    <?php
    $breadCrumbList = [
        "Trang chủ",
        $page->name
    ];
    ?>
    @include('web.breadcrumb.breadcrumb',['breadcrumbList' => $breadCrumbList, 'title' => $page->name])
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="term_conditions">
                       {!! $page->detail !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection