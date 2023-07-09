<div style="padding-top: 10px; border-top: solid 2px #f4f4f4;">
    <div class="row">
        <div class="col-sm-5 text-left">
            <div class="row">
                <div class="col-sm-8">
                    <div class="input-group">
                        <select name="action" class="form-control select2">
                            <option value="">{{ trans('admin.select_action') }}</option>
                            <option value="{{ \App\BatchAction::ACTIVE }}">✓ {{ trans('admin.active_all') }}</option>
                            <option value="{{ \App\BatchAction::INACTIVE }}">⌀ {{ trans('admin.inactive_all') }}</option>
                            <option value="{{ \App\BatchAction::DELETE }}">✗ {{ trans('admin.delete_all') }}</option>
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-primary">
                              <i class="fa fa-check"></i> {{ trans('admin.perform') }}
                          </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7 text-right">
            <div class="paginate pagination_ajax">
                @if(!empty($listData))
                    {{ $listData->links() }}
                @endif
            </div>
        </div>
    </div>
</div>