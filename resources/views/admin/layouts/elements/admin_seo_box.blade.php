<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            SEO
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
            <label class="control-label">Seo Title</label>
            {!! Form::text('seo_title', !empty($seo->title) ? $seo->title : '', ['class' => 'form-control']) !!}
            <span class="help-block text-red validation_error hide validation_seo_title"></span>
        </div>

        <div class="form-group">
            <label class="control-label">Seo Description</label>
            {!! Form::textarea('seo_description', !empty($seo->description) ? $seo->description : '', ['class' => 'form-control']) !!}
            <span class="help-block text-red validation_error hide validation_seo_description"></span>
        </div>

        <div class="form-group">
            <label class="control-label">Seo Keyword</label>
            {!! Form::text('seo_keyword', !empty($seo->keyword) ? $seo->keyword : '', ['class' => 'form-control']) !!}
            <span class="help-block text-red validation_error hide validation_seo_keyword"></span>
        </div>

    </div>
</div>