{!! Form::open(['route' => 'admin.role.batch_process', 'method' => 'POST', 'class' => 'frm_batch_process']) !!}

@include('admin.layouts.elements.record_statistic')

<?php
$admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
                <input name="check_all" class="form_check_all" data-class="check" type="checkbox">
            </th>
            <th class="order_by {{ $request->order_by == 'roles.id' ? 'active' : '' }}"
                data-order-by="roles.id" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.id') }}
                {!! $request->order_by == 'roles.id' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'roles.name' ? 'active' : '' }}"
                data-order-by="roles.name" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.name') }}
                {!! $request->order_by == 'roles.name' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th class="order_by {{ $request->order_by == 'roles.created_at' ? 'active' : '' }}"
                data-order-by="roles.created_at" data-order="{{ $request->order }}"
                data-form=".frm_form_search"> Ngày tạo
                {!! $request->order_by == 'roles.created_at' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
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
                    <td>{{ $value->created_at }}</td>
                    <td>
                        @if(auth('admin')->user()->can(config('permission.list.role.update')))
                            <span class="help_tooltip" data-toggle="tooltip"
                                  data-original-title="{{ trans('admin.edit_this_record') }}">
                            <a href="{{ route('admin.role.edit', ['id' => $value->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </span>
                        @endif
                            @if(auth('admin')->user()->can(config('permission.list.role.delete')))
                            <span class="help_tooltip" data-toggle="tooltip"
                                  data-original-title="{{ trans('admin.delete_this_record') }}">
                            <div class="btn btn-danger btn-sm btn_delete_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.role.destroy', ['id' => $value->id]) }}">
                                <i class="fa fa-close"></i>
                            </div>
                        </span>
                        @endif

                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

@include('admin.layouts.elements.paginate_and_action')

{{ Form::close() }}