@extends('web.layouts.layout')
@section('title', $page->name)
@section('content')
    <div class="container" style="margin-bottom: 100px">
        <div class="block_container">
            <div class="block_title text-uppercase">
                {{ $page->name }}
            </div>
            <div class="block_content">
                {!! $page->detail !!}
            </div>
        </div>
    </div>
@endsection