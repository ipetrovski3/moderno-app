@foreach ($orders as $order)
    <tr id="rowClass" class="table-{{ Helpers::color($order->status) }}">
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ date('d-m-Y, H:m', strtotime($order->created_at)) }}</td>
        <td>{{ $order->customer->full_name() }}</td>
        <td>{{ $order->customer->phone }}</td>
        <td>{{ $order->total_price }} Ден</td>
        <td>
            <select name="status" data-value="{{ $order->id }}" class="form-select" {{ $order->status == 'completed' ? 'disabled' : '' }}>

                @foreach ($order->statuses as $key => $status)
                    <option {{ $key == $order->status ? 'selected' : '' }} value="{{ $key }}">
                        {{ $status['name'] }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <div class="btn-group">
                <a href="{{ route('order.show', $order->id) }}" title="Преглед"class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                <button data-id="{{ $order->id }}" class="btn delete btn-danger" title="Избриши"><i class="fas fa-trash-alt"></i></button>
            </div>
        </td>
    </tr>
@endforeach
