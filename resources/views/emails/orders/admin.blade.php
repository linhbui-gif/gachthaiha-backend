@component('mail::message')
# Xin chào Admin

Có đơn hàng mới từ website HDRush.vn. Thông tin như sau:

Tên khách hàng: {{ $data['name'] ?? '' }}

Số điện thoại: {{ $data['phone'] ?? '' }}

Địa chỉ: {{ $data['address'] ?? '' }}

Nội dung yêu cầu:  {{ $data['note'] ?? '' }}

Tổng tiền đơn hàng: {{ $data['total_amount'] ?? '' }}

@component('mail::button', ['url' => route('admin.order.index')])
Chi tiết
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
