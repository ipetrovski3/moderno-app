@foreach ($customers as $customer)
    <tr id="rowClass" class="table-active">
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $customer->full_name() }}</td>
        <td>{{ $customer->phone }}</td>
        <td><strong>{{ $customer->orders->count() }}</strong></td>
        <td><strong>{{ Helper::sum_prices($customer) }}</strong></td>
        <td><button data-id="{{ $customer->id }}" class="btn btn-secondary"><i class="far fa-envelope"></i></button></td>
    </tr>
@endforeach