<?php $cart = Cart::content();
$totalAmount = 0;
?>
@if(!$cart->isEmpty())
    @foreach($cart as $key => $value)
        <?php $href = route('web.product.detail', ['link' => $value->model->link]); ?>
        <tr>
            <td class="product-thumbnail"><a title="{{ $value->name }}" href="{{ $href }}">
                    <img alt="{{ $value->name }}"
                         src="{{ $value->model->image }}"></a></td>
            <td class="product-name" data-title="Product"><a href="{{ $href }}">{{ $value->name }}</a></td>
            <td class="product-price" data-title="Price">{{ number_format($value->price) }}₫</td>
            <td class="product-quantity" data-title="Quantity">
                <div class="quantity input_qty_pr">
                    <input
                            type="button"
                            value="-"
                            class="minus"
                    >
                    <input
                            id="qtyItem{{ $value->rowId }}"
                            data-id="{{ $value->rowId }}"
                            type="text"
                            name="quantity"
                            value="{{ $value->qty }}"
                            title="Qty"
                            class="qty input_qty qtyItem{{ $value->rowId }}"
                            size="4"
                    >
                    <input
                            type="button"
                            value="+"
                            class="plus"
                    >
                </div>
            </td>
            @php
                $amount = $value->qty * $value->price;
                $totalAmount += $amount
            @endphp
            <td class="product-subtotal" data-title="Total">{{ number_format($amount) }}₫</td>
            <td class="product-remove" data-title="Remove"><a
                        href="{{ route('web.cart.delete', ['id' => $value->rowId]) }}"
                        data-id="{{ $value->rowId }}"><i class="ti-close"></i></a></td>
        </tr>
    @endforeach
@endif