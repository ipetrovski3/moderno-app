@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактура {{ $invoice->invoice_number }}</h1>
@stop


@section('content')

    <div class="card">
        <div class="card-header">
            <p>
                Купувач: <strong>{{ $invoice->company->name }}</strong>
            </p>
            <p>Датум: <strong>{{ $invoice->date }}</strong></p>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">РБ</th>
                        <th scope="col">Шифра</th>
                        <th scope="col">Артикл</th>
                        <th scope="col">Кол</th>
                        <th scope="col">Ед цена без ДДВ</th>
                        <th scope="col">ДДВ</th>
                        <th scope="col">Цена со ДДВ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ sprintf("%'04d", $product->id) }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->qty }}</td>
                            <td>{{ $product->pivot->single_price }}</td>
                            <td>{{ ($product->pivot->single_price * $product->tariff->value) / 100 }}</td>
                            <td>{{ ($product->pivot->single_price * $product->tariff->value) / 100 + $product->pivot->single_price }}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="float-right text-right">
              <p> Вкупно без ДДВ: <strong>{{ number_format($invoice->without_vat, 2) }} ден.</strong></p>
              <hr>
              <p> ДДВ: <strong>{{ number_format($invoice->vat, 2) }} ден.</strong></p>
              <hr>
              <p> Вкупен износ: <strong>{{ number_format($invoice->total_price, 2) }} ден.</strong></p>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">

@stop
