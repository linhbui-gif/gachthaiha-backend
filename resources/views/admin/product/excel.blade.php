<table>
    <tr>
        <th colspan="8" style="text-align: center;">DANH SÁCH SẢN PHẨM</th>
    </tr>
    <tr>
        <th>STT</th>
        <th>Mã SP</th>
        <th>Tên SP</th>
        <th>Giá nhập</th>
        <th>Giá niêm yết</th>
        <th>Khuyến mãi</th>
        <th>Giá bán</th>
        <th>Giá công trình</th>
    </tr>
    <tbody>
    @if(!empty($listProduct))
        @foreach($listProduct as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->purchase_price }}</td>
                <td>{{ $value->listed_price }}</td>
                <td>{{ $value->sale_price }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->wholesale_price }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>