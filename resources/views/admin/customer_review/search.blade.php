{!! Form::open(['route' => 'admin.customer_review.batch_process', 'method' => 'POST', 'class' => 'frm_batch_process']) !!}

@include('admin.layouts.elements.record_statistic')

<div class="table-responsive">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
                <input name="check_all" class="form_check_all" data-class="check" type="checkbox">
            </th>
            <th class="order_by {{ $request->order_by == 'customer_reviews.id' ? 'active' : '' }}"
                data-order-by="customer_reviews.id" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.id') }}
                {!! $request->order_by == 'customer_reviews.id' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th>Ảnh đại diện</th>
            <th class="order_by {{ $request->order_by == 'customer_reviews.name' ? 'active' : '' }}"
                data-order-by="customer_reviews.name" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.name') }}
                {!! $request->order_by == 'customer_reviews.name' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'customer_reviews.position' ? 'active' : '' }}"
                data-order-by="customer_reviews.position" data-order="{{ $request->order }}"
                data-form=".frm_form_search">Chức vụ
                {!! $request->order_by == 'customer_reviews.position' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'customer_reviews.company' ? 'active' : '' }}"
                data-order-by="customer_reviews.company" data-order="{{ $request->order }}"
                data-form=".frm_form_search">Công ty
                {!! $request->order_by == 'customer_reviews.company' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'customer_reviews.status' ? 'active' : '' }}"
                data-order-by="customer_reviews.status" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.status') }}
                {!! $request->order_by == 'customer_reviews.status' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
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
                    <td>
                        <img src="{{ $value->image }}" class="img-responsive" style="width: 60px; height: 60px; object-fit: cover" />
                    </td>
                    <td>{{ $value->customer_name }}</td>
                    <td>{{ $value->position }}</td>
                    <td>{{ $value->company }}</td>
                    <td>
                        @if($value->status == \App\Models\BaseModel::STATUS_ACTIVE)
                            <label class="label label-success update_status"
                                   data-id="{{ $value->id }}"
                                   data-status="{{ \App\Models\BaseModel::STATUS_ACTIVE }}"
                                   data-update="{{ \App\Models\BaseModel::STATUS_INACTIVE }}"
                                   data-url="{{ route('admin.customer_review.update_status') }}">
                                <i class="fa fa-check"></i> {{ trans('admin.active') }}
                            </label>
                        @else
                            <label class="label label-default update_status"
                                   data-id="{{ $value->id }}"
                                   data-status="{{ \App\Models\BaseModel::STATUS_INACTIVE }}"
                                   data-update="{{ \App\Models\BaseModel::STATUS_ACTIVE }}"
                                   data-url="{{ route('admin.customer_review.update_status') }}">
                                <i class="fa fa-ban"></i> {{ trans('admin.inactive') }}</label>
                        @endif
                    </td>
                    <td>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.copy_this_record') }}">
                            <div class="btn btn-default btn-sm btn_copy_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.customer_review.copy', ['id' => $value->id]) }}">
                                <i class="fa fa-copy"></i>
                            </div>
                        </span>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.edit_this_record') }}">
                            <a href="{{ route('admin.customer_review.edit', ['id' => $value->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </span>

                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.delete_this_record') }}">
                            <div class="btn btn-danger btn-sm btn_delete_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.customer_review.destroy', ['id' => $value->id]) }}">
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