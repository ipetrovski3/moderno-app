<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <title>New Order</title>
</head>

<body>
    <h2>Пристигната е нова нарачка</h2>

    <h3>Податоци за нарачателот:</h3>
        <ul>Име и презиме {{ $order->customer->first_name . ' ' . $order->customer->last_name }} </ul>
        <ul>Телефон {{ $order->customer->phone }}</ul>

    <hr>

    <h3>Податоци за нарачката</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Продукт</th>
                <th scope="col">Големина</th>
                <th scope="col">Количина</th>
                <th scope="col">Ед. Цена</th>
                <th scope="col">Вкупна Цена</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
                <tr class="table-active">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->size }}</td>
                    <td>{{ $product->pivot->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price * $product->pivot->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <strong> {{ $order->total_price }} Денари</strong>

    <a href="{{ env('APP_URL') . 'dashboard' }}">Логирај се</a>
</body>

</html>

