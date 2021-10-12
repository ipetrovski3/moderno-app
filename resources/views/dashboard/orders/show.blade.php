@extends('adminlte::page')

@section('content')
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
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->qty }}</td>
                    <td>{{ strtoupper($product->pivot->size) }}</td>
                    <td>{{ $product->price }} Ден.</td>
                    <td>{{ $product->pivot->qty * $product->price }} Ден.</td>
                </tr>
            @endforeach


        @endsection
