{!! Form::open(['route' => 'admin.order.batch_process', 'method' => 'POST', 'class' => 'frm_batch_process']) !!}

@include('admin.layouts.elements.record_statistic')

<div class="table-responsive">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
                <input name="check_all" class="form_check_all" data-class="check" type="checkbox">
            </th>
            <th class="order_by {{ $request->order_by == 'order.id' ? 'active' : '' }}"
                data-order-by="orders.id" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.id') }}
                {!! $request->order_by == 'order.id' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'order.name' ? 'active' : '' }}"
                data-order-by="orders.name" data-order="{{ $request->order }}"
                data-form=".frm_form_search"> Tên khách hàng
                {!! $request->order_by == 'order.name' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
            <th class="order_by {{ $request->order_by == 'order.status' ? 'active' : '' }}"
                data-order-by="orders.status" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.status') }}
                {!! $request->order_by == 'order.status' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($listData))
            @foreach($listData as $key => $value)
                <tr>
                    <td>
                        <input class="form_check_one" name="check[{{ $value->id }}]" value="{{ $value->id }}"
                               type="checkbox">
                    </td>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ number_format($value->total_amount) }}</td>
                    <td>
                        @if($value->status == \App\Models\BaseModel::STATUS_ACTIVE)
                            <label class="label label-success update_status"
                                   data-id="{{ $value->id }}"
                                   data-status="{{ \App\Models\BaseModel::STATUS_ACTIVE }}"
                                   data-update="{{ \App\Models\BaseModel::STATUS_INACTIVE }}"
                                   data-url="{{ route('admin.order.update_status') }}">
                                <i class="fa fa-check"></i> {{ trans('admin.active') }}
                            </label>
                        @else
                            <label class="label label-default update_status"
                                   data-id="{{ $value->id }}"
                                   data-status="{{ \App\Models\BaseModel::STATUS_INACTIVE }}"
                                   data-update="{{ \App\Models\BaseModel::STATUS_ACTIVE }}"
                                   data-url="{{ route('admin.order.update_status') }}">
                                <i class="fa fa-ban"></i> {{ trans('admin.inactive') }}</label>
                        @endif
                    </td>
                    <td>

                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.view_this_record') }}">
                            <a href="{{ route('admin.order.edit', ['id' => $value->id]) }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                        </span>

                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.delete_this_record') }}">
                            <div class="btn btn-danger btn-sm btn_delete_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.order.destroy', ['id' => $value->id]) }}">
                                <i class="fa fa-close"></i>
                            </div>
                        </span>

                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

@include('admin.layouts.elements.paginate_and_action')

{{ Form::close() }}