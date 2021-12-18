@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>
@stop


@section('content')
    <a href="{{ route('images.create') }}"></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Датум</th>
                <th scope="col">Купувач</th>
                <th scope="col">Тип</th>
                <th scope="col">Број на фактура</th>
                <th scope="col">Износ Со ДДВ</th>
                <th scope="col">Акција</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <th scope="row" class="py-auto">{{ $loop->iteration }}</th>
                    <td class="py-auto">{{ $invoice->created_at->format('d.m.Y') }}</td>
                    <td class="py-auto">{{ $invoice->invoicable->full_name() }}</td>
                    <td class="py-auto">{{ Helpers::buyer_type($invoice->invoicable_type) }}</td>
                    <td class="py-auto">{{ $invoice->invoice_number }}</td>
                    <td class="py-auto">{{ number_format($invoice->total_price, 2) }} ден</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('invoices.show', $invoice->uniqid) }}" class="btn btn-success text-white"><i class="fas fa-file-invoice"></i></a>
                            <a href="{{ route('invoices.show', $invoice->uniqid) }}" class="btn btn-info text-white"><i class="fas fa-print"></i></a>
                    </td>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script>

    </script>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">

@stop
