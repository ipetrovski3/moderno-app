@foreach ($orders as $order)
    <tr id="rowClass" class="table-{{ Helper::color($order->status) }}">
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $order->customer->first_name . ' ' . $order->customer->last_name }}</td>
        <td>{{ $order->customer->phone }}</td>
        <td>{{ $order->total_price }}</td>
        <td>
            <select name="status" data-value="{{ $order->id }}" class="form-select">

                @foreach ($order->statuses as $key => $status)
                    <option {{ $key == $order->status ? 'selected' : '' }} value="{{ $key }}">
                        {{ $status['name'] }}
                    </option>
                @endforeach
            </select>
        </td>
        <td> <a href="{{ route('order.show', $order->id) }}" class="btn btn-info"> Преглед </a></td>
    </tr>
@endforeach
