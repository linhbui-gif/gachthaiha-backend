@extends('admin.layouts.layout')
@php
    $pageTitle = !empty($pageTitle) ? $pageTitle : 'Thêm mới tin tức';
@endphp
@section('title', $pageTitle)
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(!empty($record))
            {!! Form::model($record, ['method' => 'POST', 'class' => 'frm_form_add']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'class' => 'frm_form_add']) !!}
        @endif
        <div class="row">
            <div class="col-sm-9">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {{ $pageTitle }}
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên sản phẩm', ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control generate_alias',
                            'data-render' => 'render_link', 'placeholder' => 'Tên sản phẩm' ]) !!}
                            <span class="help-block text-red validation_error hide validation_name"></span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', trans('admin.link'), ['class' => 'control-label']) !!} <span
                                    class="text-red" style="font-weight: 600">*</span>
                            {!! Form::text('link', old('link'), ['class' => 'form-control render_link', 'placeholder' => trans('admin.link')]) !!}
                            <span class="help-block text-red validation_error hide validation_link"></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('sku', 'Mã sản phẩm', ['class' => 'control-label']) !!}
                                    <span class="text-red" style="font-weight: 600">*</span>
                                    {!! Form::text('sku', old('sku'), ['class' => 'form-control', 'placeholder' => 'Mã sản phẩm']) !!}
                                    <span class="help-block text-red validation_error hide validation_sku"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('purchase_price', 'Giá nhập', ['class' => 'control-label']) !!}
                                    <span class="text-red" style="font-weight: 600">*</span>
                                    <?php
                                    $purchasePrice = !empty($record) ? $record->purchase_price : old('purchase_price');
                                    $purchasePrice = (int)(str_replace([',', '.'], '', $purchasePrice));
                                    ?>
                                    {!! Form::text('purchase_price', number_format($purchasePrice), ['class' => 'form-control input_money', 'placeholder' => 'Giá nhập']) !!}
                                    <span class="help-block text-red validation_error hide validation_purchase_price"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('price', 'Giá niêm yết', ['class' => 'control-label']) !!}
                                    <span class="text-red" style="font-weight: 600">*</span>
                                    <?php
                                    $price = !empty($record) ? $record->price : old('price');
                                    $price = (int)(str_replace([',', '.'], '', $price));
                                    ?>
                                    {!! Form::text('price', number_format($price), ['class' => 'form-control input_money', 'placeholder' => 'Giá niêm yết']) !!}
                                    <span class="help-block text-red validation_error hide validation_price"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('sale_price', 'Giá khuyến mãi', ['class' => 'control-label']) !!}
                                    <?php
                                    $salePrice = !empty($record) ? $record->sale_price : old('sale_price');
                                    $salePrice = (int)(str_replace([',', '.'], '', $salePrice));
                                    ?>
                                    {!! Form::text('sale_price', number_format($salePrice), ['class' => 'form-control input_money', 'placeholder' => 'Giá khuyến mãi']) !!}
                                    <span class="help-block text-red validation_error hide validation_sale_price"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('sale_price', 'Giá sỉ công trình', ['class' => 'control-label']) !!}
                                    <?php
                                    $wholeSalePrice = !empty($record) ? $record->wholesale_price : old('wholesale_price');
                                    $wholeSalePrice = (int)(str_replace([',', '.'], '', $wholeSalePrice));
                                    ?>
                                    {!! Form::text('wholesale_price', number_format($wholeSalePrice), ['class' => 'form-control input_money', 'placeholder' => 'Giá sỉ công trình']) !!}
                                    <span class="help-block text-red validation_error hide validation_wholesale_price"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <span class="help-block text-red validation_error hide validation_description"></span>
                            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description', 'rows' => 5, 'placeholder' => 'Mô tả về sản phẩm']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nội dung chi tiết sản phẩm</label>
                            <span class="help-block text-red validation_error hide validation_detail"></span>
                            {!! Form::textarea('detail', old('detail'), ['class' => 'form-control', 'id' => 'editor1']) !!}
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                {!! \App\Libs\SeoLib::adminSEOBox(\App\Models\News::class, !empty($seo) ? $seo : '') !!}
            </div>

            <div class="col-sm-3">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Thuộc tính sản phẩm
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            @php
                                $status = array(
                                    \App\Models\BaseModel::STATUS_ACTIVE => trans('admin.active'),
                                    \App\Models\BaseModel::STATUS_INACTIVE => trans('admin.inactive')
                                );
                            @endphp
                            {!! Form::select('status', $status, old('status'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_status"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'Danh mục sản phẩm', ['class' => 'control-label']) !!}
                            {!! Form::select('category_id', ['' => 'Chọn danh mục'] + $listCategory, old('category_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_category_id"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('type_id', 'Loại gạch', ['class' => 'control-label']) !!}
                            {!! Form::select('type_id', ['' => 'Chọn loại'] + $listType, old('type_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_type_id"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('surface_id', 'Bề mặt gạch', ['class' => 'control-label']) !!}
                            {!! Form::select('surface_id', ['' => 'Chọn bề mặt'] + $listSurface, old('surface_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_surface_id"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('brand_id', 'Thương hiệu sản xuất', ['class' => 'control-label']) !!}
                            {!! Form::select('brand_id', ['' => 'Chọn thương hiệu'] + $listBrand, old('brand_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_brand_id"></span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('size_id', 'Kích thước', ['class' => 'control-label']) !!}
                            {!! Form::select('size_id', ['' => 'Chọn kích thước'] + $listSize, old('size_id'), ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_size_id"></span>
                        </div>

                    </div>
                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Ảnh đại diện
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="avatar_container text-center form-group {{ empty($record) ? 'hide' : '' }}">
                            <img src="{{ !empty($record) ? $record->image : '' }}" class="img_avatar img-responsive"/>
                            {!! Form::hidden('image', old('image'), ['class' => 'input_avatar']) !!}
                        </div>
                        <div class="text-center">
                            <div class="btn btn-default btn_choose_avatar {{ !empty($record) ? 'hide' : '' }}">
                                <i class="fa fa-image"></i> Click chọn ảnh đại diện
                            </div>
                            <div class="btn btn-danger btn_delete_avatar {{ empty($record) ? 'hide' : '' }}">
                                <i class="fa fa-close"></i> Xóa ảnh đại diện
                            </div>
                        </div>
                        <span class="help-block text-red validation_error hide validation_avatar"></span>
                    </div>
                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Ảnh đặc trưng
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="feature_image_container row">
                            @if(!empty($record))
                                <?php $featureImage = json_decode($record->feature_image, 1); ?>
                                @if(!empty($featureImage))
                                    @foreach($featureImage as $key => $value)
                                        <div class="col-sm-4 form-group">
                                            <div class="feature_image_box">
                                                <img src="{{ $value }}" class="img-responsive"/>
                                                <input type="hidden" name="feature_image[{{ $key + 1 }}]"
                                                       value="{{ $value }}"/>
                                                <label class="btn_delete_feature_image label label-danger">
                                                    <i class="fa fa-close"></i>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                        <div class="text-center">
                            <div class="btn btn-default btn_choose_feature_image">
                                <i class="fa fa-image"></i> Click chọn ảnh đặc trưng
                            </div>
                        </div>
                        <span class="help-block text-red validation_error hide validation_feature_image"></span>
                    </div>
                </div>

            </div>

            <div class="submit_fixed">
                <div class="content-wrapper text-center" style="background: #fff;">
                    <div class="col-sm-6">
                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i> {{ $pageTitle }}
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <!-- /.content -->

@endsection


@section('script')
    @include('admin.layouts.elements.ckeditor_script')
    <style type="text/css">
        .list_color_row {
            padding-top: 15px;
            padding-bottom: 15px;
            border-bottom: dotted 1px #ddd;
        }
    </style>
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {
            $('.btn_choose_feature_image').click(function () {
                CKFinder.popup({
                    chooseFiles: true,
                    onInit: function (finder) {
                        finder.on('files:choose', function (evt) {
                            var file = evt.data.files.models;
                            $.each(file, function (key, value) {
                                var url = value.getUrl();
                                var randomKey = $('.feature_image_box').length;
                                var html = `
                                    <div class="col-sm-4 form-group">
                                        <div class="feature_image_box">
                                            <img src="${url}" class="img-responsive" />
                                            <input type="hidden" name="feature_image[${randomKey}]" value="${url}" />
                                            <label class="btn_delete_feature_image label label-danger">
                                                <i class="fa fa-close"></i>
                                            </label>
                                        </div>
                                    </div>
                                `;
                                $('.feature_image_container').append(html);
                            });

                        });
                    }
                });
            });


            $(document).on('click', '.btn_delete_feature_image', function () {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection