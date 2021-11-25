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
                <th scope="col">Акција</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $invoice->created_at->format('d.m.Y') }}</td>
                    <td>{{ $invoice->invoicable->full_name() }}</td>
                    <td>{{ Helpers::buyer_type($invoice->invoicable_type) }}</td>
                    <td>{{ $invoice->number }}</td>
                    <td><a href="{{ route('invoices.show', $invoice->number) }}">{{ 'Ф-ра бр: ' . $invoice->number }}
                        </a></td>
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
