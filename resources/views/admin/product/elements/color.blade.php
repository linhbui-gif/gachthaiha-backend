<div class="row list_color_row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::text('color['.$key.'][name]', old('color['.$key.'][name]'), ['class' => 'form-control', 'placeholder' => 'Tên màu sắc']) !!}
        </div>
        <div class="btn btn-default btn_chose_color_avatar" data-key="{{ $key }}">
            <i class="fa fa-image"></i> Ảnh đại diện cho màu
        </div>
    </div>
    <div class="col-sm-2">
        <div class="color_avatar_display form-group">
            {!! Form::hidden('color['.$key.'][image]', old('color['.$key.'][image]'), ['class' => 'input_color_image_'.$key]) !!}
            <img src="{{ $value['image'] ?? asset('assets/admin/dist/img/default-50x50.gif') }}"
                 class="color_img_avatar_{{ $key }} img-responsive"
                 style="width: 80px; height: 80px; object-fit: cover"/>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="color_feature_image_display_{{ $key }} row">
            <?php $featureImage = json_decode($value['feature_image']); ?>
            @if(!empty($featureImage))
                @foreach($featureImage as $k => $v)
                        <div class="col-sm-4 form-group">
                            <div class="feature_image_box">
                                <img src="{{ $v }}" class="img-responsive">
                                <input type="hidden" name="color[{{ $key }}][feature_image][{{ $k }}]" value="{{ $v }}">
                                <label class="btn_delete_feature_image label label-danger">
                                    <i class="fa fa-close"></i>
                                </label>
                            </div>
                        </div>
                @endforeach
            @endif
        </div>
        <div class="btn btn-default btn_chose_color_feature_image" data-key="{{ $key }}">
            <i class="fa fa-image"></i> Danh sách ảnh cho màu sắc
        </div>
    </div>
    <div class="col-sm-1">
        @if($key == 0)
            <div class="btn btn-warning btn_add_color"><i class="fa fa-plus"></i> Thêm</div>
        @else
            <div class="btn btn-danger btn_remove_color"><i class="fa fa-close"></i> Xóa</div>
        @endif
    </div>
</div>