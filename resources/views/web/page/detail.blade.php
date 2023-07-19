@extends('web.layouts.layout')
@section('title', $page->name)
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
                       {!! $page->deta !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection