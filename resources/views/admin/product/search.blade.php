{!! Form::open(['route' => 'admin.product.batch_process', 'method' => 'POST', 'class' => 'frm_batch_process']) !!}

@include('admin.layouts.elements.record_statistic')

<div class="table-responsive">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
                <input name="check_all" class="form_check_all" data-class="check" type="checkbox">
            </th>
            <th class="order_by {{ $request->order_by == 'products.id' ? 'active' : '' }}"
                data-order-by="products.id" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.id') }}
                {!! $request->order_by == 'products.id' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th>Ảnh đại diện</th>
            <th class="order_by {{ $request->order_by == 'products.name' ? 'active' : '' }}"
                data-order-by="products.name" data-order="{{ $request->order }}"
                data-form=".frm_form_search">Tên sản phẩm
                {!! $request->order_by == 'products.name' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
            </th>
            <th>Giá nhập</th>
            <th>Giá niêm yết</th>
            <th>Giá bán</th>
            <th>Giá công trình</th>
            <th class="order_by {{ $request->order_by == 'products.status' ? 'active' : '' }}"
                data-order-by="products.status" data-order="{{ $request->order }}"
                data-form=".frm_form_search">{{ trans('admin.status') }}
                {!! $request->order_by == 'products.status' ? ($request->order == 'ASC' ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>') : '<i class="fa fa-sort"></i>' !!}
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
                    <th>
                        @if(!empty($value->image))
                            <img src="{{ $value->image }}" class="img-responsive"
                                 style="width: 60px; height: 60px; object-fit: cover"/>
                        @endif
                    </th>
                    <td>
                        <label>
                            {{ $value->name }}
                        </label>
                        <br/>
                        <u><b>Danh mục:</b></u> <i>{{ $value->category->name ?? '' }}</i> |
                        <u><b>Kích thước:</b></u> <i>{{ $value->size->name ?? '' }}</i><br/>
                        <u><b>Bề mặt:</b></u> <i>{{ $value->surface->name ?? '' }}</i> |
                        <u><b>Thương hiệu:</b></u> <i>{{ $value->brand->name ?? '' }}</i>
                    </td>
                    <td>
                        <span class="purchase_price_{{ $value->id }}">
                            {{ number_format($value->purchase_price) }}
                        </span>
                        <br/>
                        <div>
                            <input type="text"
                                   class="input_money input_update_price input_purchase_price_{{ $value->id }}"
                                   style="width: 80px; height: 23px;"/>
                            <button data-id="{{ $value->id }}" data-type="purchase_price" type="button"
                                    class="btn btn-primary btn-xs btn_update" style="margin-top: -3px;">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <span class="listed_price_{{ $value->id }}">
                            {{ number_format($value->listed_price) }}
                        </span>
                        <br/>
                        <div>
                            <input type="text"
                                   class="input_money input_update_price input_listed_price_{{ $value->id }}"
                                   style="width: 80px; height: 23px;"/>
                            <button data-id="{{ $value->id }}" data-type="listed_price" type="button"
                                    class="btn btn-primary btn-xs btn_update" style="margin-top: -3px;">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <span class="price_{{ $value->id }}">
                            {{ number_format($value->price) }}
                        </span>
                        <br/>
                        <div>
                            <input type="text" class="input_money input_update_price input_price_{{ $value->id }}"
                                   style="width: 80px; height: 23px;"/>
                            <button data-id="{{ $value->id }}" data-type="price" type="button"
                                    class="btn btn-primary btn-xs btn_update" style="margin-top: -3px;">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <span class="wholesale_price_{{ $value->id }}">
                            {{ number_format($value->wholesale_price) }}
                        </span>
                        <br/>
                        <div>
                            <input type="text"
                                   class="input_money input_update_price input_wholesale_price_{{ $value->id }}"
                                   style="width: 80px; height: 23px;"/>
                            <button data-id="{{ $value->id }}" data-type="wholesale_price" type="button"
                                    class="btn btn-primary btn-xs btn_update" style="margin-top: -3px;">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        @if($value->status == \App\Models\BaseModel::STATUS_ACTIVE)
                            <label class="label label-success update_status"
                                   data-id="{{ $value->id }}"
                                   data-status="{{ \App\Models\BaseModel::STATUS_ACTIVE }}"
                                   data-update="{{ \App\Models\BaseModel::STATUS_INACTIVE }}"
                                   data-url="{{ route('admin.product.update_status') }}">
                                <i class="fa fa-check"></i> {{ trans('admin.active') }}
                            </label>
                        @else
                            <label class="label label-default update_status"
                                   data-id="{{ $value->id }}"
                                   data-status="{{ \App\Models\BaseModel::STATUS_INACTIVE }}"
                                   data-update="{{ \App\Models\BaseModel::STATUS_ACTIVE }}"
                                   data-url="{{ route('admin.product.update_status') }}">
                                <i class="fa fa-ban"></i> {{ trans('admin.inactive') }}</label>
                        @endif
                    </td>
                    <td>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.copy_this_record') }}">
                            <div class="btn btn-default btn-sm btn_copy_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.product.copy', ['id' => $value->id]) }}">
                                <i class="fa fa-copy"></i>
                            </div>
                        </span>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.view_this_record') }}">
                            <a href="{{ route('web.product.detail', ['link' => $value->link]) }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                        </span>
                        <div class="clearfix" style="height: 3px; display: block;"></div>
                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.edit_this_record') }}">
                            <a href="{{ route('admin.product.edit', ['id' => $value->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </span>

                        <span class="help_tooltip" data-toggle="tooltip"
                              data-original-title="{{ trans('admin.delete_this_record') }}">
                            <div class="btn btn-danger btn-sm btn_delete_record" data-id="{{ $value->id }}"
                                 data-url="{{ route('admin.product.destroy', ['id' => $value->id]) }}">
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