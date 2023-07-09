{!! Form::open(['route' => 'admin.setting.batch_process', 'method' => 'POST', 'class' => 'frm_batch_process']) !!}

@include('admin.layouts.elements.record_statistic')

<div class="table-responsive">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
                <input name="check_all" class="form_check_all" data-class="check" type="checkbox">
            </th>
            <th class="order_by {{ $request->order_by == 'settings.id' ? 'active' : '' }}"
                data-order-by="settings.id" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.id') }}
                {!! $request->order_by == 'settings.id' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'settings.setting_key' ? 'active' : '' }}"
                data-order-by="settings.setting_key" data-order="{{ $request->order }}"
                data-form=".frm_form_search">Key
                {!! $request->order_by == 'settings.setting_key' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'settings.setting_value' ? 'active' : '' }}"
                data-order-by="settings.setting_value" data-order="{{ $request->order }}"
                data-form=".frm_form_search">Value
                {!! $request->order_by == 'settings.setting_value' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($listData))
            @foreach($listData as $key => $value)
                <tr>
                    <td>
                        <input class="form_check_one" name="check[{{ $value->id }}]" value="{{ $value->id }}" type="checkbox">
                    </td>
                    <td>{{ $value->id }}</td>
                    <td>{{ \App\Models\Setting::$listKey[$value->setting_key] ?? $value->setting_key }}</td>
                    <td>{{ substr(strip_tags($value->setting_value), 0, 100).'...' }}</td>
                    <td>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.copy_this_record') }}">
                            <div class="btn btn-default btn-sm btn_copy_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.setting.copy', ['id' => $value->id]) }}">
                                <i class="fa fa-copy"></i>
                            </div>
                        </span>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.view_this_record') }}">
                            <a href="{{ route('admin.setting.show', ['id' => $value->id]) }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                        </span>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.edit_this_record') }}">
                            <a href="{{ route('admin.setting.edit', ['id' => $value->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </span>

                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.delete_this_record') }}">
                            <div class="btn btn-danger btn-sm btn_delete_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.setting.destroy', ['id' => $value->id]) }}">
                                <i class="fa fa-close"></i>
                            </div>
                        </span>

                    </td>
                </tr>
            @endforeach
        @else
            
        @endif
        </tbody>
    </table>
</div>

@include('admin.layouts.elements.paginate_and_action')

{{ Form::close() }}