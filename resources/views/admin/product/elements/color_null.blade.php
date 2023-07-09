<div class="row list_color_row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('color[0][name]', old('color[0][name]'), ['class' => 'form-control', 'placeholder' => 'Tên màu sắc']) !!}
        </div>
        <div class="btn btn-default btn_chose_color_avatar" data-key="0">
            <i class="fa fa-image"></i> Ảnh đại diện cho màu
        </div>
    </div>
    <div class="col-sm-2">
        <div class="color_avatar_display form-group">
            {!! Form::hidden('color[0][image]', old('color[0][image]'), ['class' => 'input_color_image_0']) !!}
            <img src="{{ asset('assets/admin/dist/img/default-50x50.gif') }}"
                 class="color_img_avatar_0 img-responsive"
                 style="width: 80px; height: 80px; object-fit: cover"/>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="color_feature_image_display_0 row"></div>
        <div class="btn btn-default btn_chose_color_feature_image" data-key="0">
            <i class="fa fa-image"></i> Danh sách ảnh cho màu sắc
        </div>
    </div>
    <div class="col-sm-1">
        <div class="btn btn-warning btn_add_color"><i class="fa fa-plus"></i> Thêm</div>
    </div>
</div>