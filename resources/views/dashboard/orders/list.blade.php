@foreach ($orders as $order)
    <tr id="rowClass" class="table-{{ Helper::color($order->status) }}">
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ date('d-m-Y, H:m', strtotime($order->created_at)) }}</td>
        <td>{{ $order->customer->first_name . ' ' . $order->customer->last_name }}</td>
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
            <a href="{{ route('order.show', $order->id) }}" class="btn btn-info"> Преглед </a>
            <button data-id="{{ $order->id }}" class="btn delete btn-danger">Избриши</button>
            {{-- <form action="{{ route('order.delete', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">brisi</button>
            </form> --}}
            {{-- <a href="{{ route('delete.order', $order->id) }}" class="btn btn-warning">asdasdas</a> --}}
        </td>
    </tr>
@endforeach
