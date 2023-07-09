<div class="row banner-count">
    <div class="col-sm-12">
        <div class="row form-horizontal">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-3 text-right">
                        <label class="control-label">{{ trans('admin.title') }}</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="list_image[${randomKey}][title]"
                               placeholder="{{ trans('admin.title') }}" value="">
                        <span class="help-block text-red validation_error hide validation_list_image_${randomKey}_title"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 text-right">
                        <label class="control-label">{{ trans('admin.link') }}
                            <span class="tooltip-element" data-toggle="tooltip" style="" title=""
                                  data-original-title="{{ trans('admin.link_description') }}">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"
                               name="list_image[${randomKey}][link]"
                               placeholder="{{ trans('admin.link') }}" value="">
                        <span class="help-block text-red validation_error hide validation_list_image_${randomKey}_link"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 text-right">
                        <label class="control-label">{{ trans('admin.image') }}</label>
                    </div>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="banner_image_${randomKey}"
                                   name="list_image[${randomKey}][image]" placeholder="URL" value="">
                            <div class="input-group-btn">
                                <div class="btn btn-primary btn-upload-file"
                                     onclick="selectFileWithCKFinder('banner_image_${randomKey}');">
                                    <i class="fa fa-image"></i> {{ trans('admin.select_image') }}
                                </div>
                            </div>
                        </div>
                        <span class="help-block text-red validation_error hide validation_list_image_${randomKey}_image"></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="col-sm-3 text-right">
                    <label class="control-label">{{ trans('admin.description') }}</label>
                </div>
                <div class="col-sm-9">
                    <textarea name="list_image[${randomKey}][description]" placeholder="{{ trans('admin.description') }}"
                              class="form-control" rows="6"></textarea>
                    <span class="help-block text-red validation_error hide validation_list_image_${randomKey}_description"></span>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="btn btn-sm btn-danger btn-rm-banner" style="margin-top:23px;">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
        </div>
    </div>
</div>