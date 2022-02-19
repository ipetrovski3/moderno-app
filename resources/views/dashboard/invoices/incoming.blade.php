@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Датум</th>
                    <th scope="col">Добавувач</th>
                    <th scope="col">Број на Документ</th>
                    <th scope="col">Износ Со ДДВ</th>
{{--                    <th scope="col">Акција</th>--}}
{{--                    <th scope="col">Наб. цени</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <th scope="row" class="py-auto">{{ $loop->iteration }}</th>                            {{-- <td class="py-auto">{{ $invoice->date->format('d.m.Y') }}</td> --}}
                        <td class="py-auto">{{ date('d.m.Y', strtotime($invoice->date)) }}</td>

                        <td class="py-auto">{{ $invoice->company->name }}</td>
                        <td class="py-auto">{{ $invoice->invoice_number }}</td>
                        <td class="py-auto">{{ number_format($invoice->total_price, 2, ',', '.') }} ден</td>
{{--                        <td>--}}
{{--                            <div class="btn-group">--}}
{{--                                <a href="{{ route('invoices.show', $invoice->uniqid) }}"--}}
{{--                                   class="btn btn-success text-white"><i class="fas fa-file-invoice"></i></a>--}}
{{--                                <a href="{{ route('invoice.pdf', $invoice->uniqid) }}"--}}
{{--                                   class="btn btn-info text-white"><i class="fas fa-print"></i></a>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td><a href="{{ route('invoice.cost', $invoice->id) }}">Набавни цени</a> </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
