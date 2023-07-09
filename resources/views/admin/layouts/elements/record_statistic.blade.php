<div class="row" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: solid 2px #f2f2f2;">
    <div class="col-sm-5">
        {{ trans('admin.display') }}
        @php
            $limit = ['10' => 10, '20' => 20, '50' => 50, '100' => 100];
            $selected = $request->limit ? $request->limit : 10;
        @endphp
        {!! Form::select('limit', $limit, $selected, ['class' => 'select2 change_limit', 'style' => 'min-width: 60px;']) !!}
        {{ trans('admin.of_total') }} <b>{{ !empty($listData) ? $listData->total() : 0 }}</b> {{ strtolower(trans('admin.record')) }}
    </div>
    <div class="col-sm-7 text-right">
        <div class="paginate pagination_ajax">
            @if(!empty($listData))
                {{ $listData->links() }}
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
</div>
