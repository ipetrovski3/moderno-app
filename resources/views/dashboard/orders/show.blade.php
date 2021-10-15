@extends('adminlte::page')

@section('content_header')
    <h1>{{ 'Нарачка бр. ' . $order->id }}</h1>
@stop

@section('content')
    <div class="container">
        <a href="{{ URL::previous() }}" class="btn btn-info">Назад</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Продукт</th>
                    <th scope="col">Количина</th>
                    <th scope="col">Големина</th>
                    <th scope="col">Единечна Цена</th>
                    <th scope="col">Вкупно</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="table-active">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name . " (" . $product->category->name . ")" }}</td>
                        <td>{{ $product->pivot->qty }}</td>
                        <td>{{ strtoupper($product->pivot->size) }}</td>
                        <td>{{ $product->price }} Ден.</td>
                        <td>{{ $product->pivot->qty * $product->price }} Ден.</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Инфо за нарачателот</h3>
                    </div>
                    <div class="card-body">
                        <ul>Име и Презиме: <strong>{{ $customer->full_name() }}</strong></ul>
                        <ul>Телефон: <strong>{{ $customer->phone }}</strong></ul>
                        <ul>Телефон: <strong>{{ $customer->email }}</strong></ul>
                        <ul>Адреса: <strong>{{ $customer->delivery_address() }}</strong></ul>
                    </div>
                    <div class="card-footer">
                        <p>Вкупна цена на нарачката: <strong>{{ $order->total_price }}ден</strong>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h4>Статус на нарачката</h4>
                <select name="status" data-value="{{ $order->id }}" class="form-select">

                    @foreach ($order->statuses as $key => $status)
                        <option {{ $key == $order->status ? 'selected' : '' }} value="{{ $key }}">
                            {{ $status['name'] }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('select').on('change', this, function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                let status = $(this).val()
                let orderId = $(this).data('value');
                let element = $(this).parent('row')
                console.log(element)
                $.ajax({
                    type: "POST",
                    url: "{{ route('status.update') }}",
                    data: {
                        status: status,
                        id: orderId
                    },
                    success: function(data) {
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Известување',
                            autohide: true,
                            delay: 1300,
                            body: 'Статусот нарачката е променет!'
                        })
                        console.log(data)

                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            });
        })
    </script>

@endsection
