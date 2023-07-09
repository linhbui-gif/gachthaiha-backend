@if(!empty($detail))
    @foreach($detail as $key => $value)
        <div class="row menu-item-count">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Tiêu đề</label>
                            <input type="text" class="form-control" name="item[{{ $value['id'] }}][title]" value="{{ $value['title'] }}" />
                            <span class="help-block text-red validation_error hide validation_list_image_{{ $value['id'] }}_title"></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Cấp cha</label>
                            <?php $listParentMenu = !empty($listParentMenu) ? ['' => 'Chọn cấp cha'] + $listParentMenu : []; ?>
                            {!! Form::select('item['.$value['id'].'][parent_id]', $listParentMenu, $value['parent_id'], ['class' => 'form-control select2']) !!}
                            <span class="help-block text-red validation_error hide validation_list_image_{{ $value['id'] }}_title"></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Đường dẫn</label>
                            <input type="text" class="form-control" name="item[{{ $value['id'] }}][link]" value="{{ $value['link'] }}" />
                            <span class="help-block text-red validation_error hide validation_list_image_{{ $value['id'] }}_link"></span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Vị trí</label>
                            <input type="number" class="form-control" name="item[{{ $value['id'] }}][position]" value="{{ $value['position'] }}" />
                            <span class="help-block text-red validation_error hide validation_list_image_{{ $value['id'] }}_position"></span>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="btn btn-sm btn-danger btn-rm-menu-item" style="margin-top:23px;">
                            <i class="fa fa-close"></i>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
            </div>
        </div>
    @endforeach
@endif