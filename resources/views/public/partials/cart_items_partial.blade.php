@foreach($cart_items as $item)
    <tr>
        <td class="name-pr">
            <a href="#">{{ $item->name }} </a>
        </td>
        <td class="price-pr">
            <p>{{ number_format($item->price + $item->tax, 2, ',', '.') . ' ден' }}</p>
        </td>
        <td class="quantity-box"><input type="number" size="4" value="{{ $item->qty }}" min="0" step="1" class="c-input-text qty text"></td>
        <td class="total-pr">
            <p>{{ number_format(($item->price + $item->tax) * $item->qty, 2, ',', '.') }}</p>
        </td>
        <td class="remove-pr" data-id="{{ $item->rowId }}">
            <a href="#">
                <i class="fas fa-times"></i>
            </a>
        </td>
    </tr>
@endforeach
