@extends('adminlte::page')

@section('title', 'Профактури Испратници')

@section('content_header')
    <h1>Профактура/Испратница</h1>
    <a href="{{ route('proforma.create') }}" class="btn btn-success">Нов Документ</a>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Датум</th>
                    <th scope="col">Купувач</th>
                    <th scope="col">Број</th>
                    <th scope="col">Износ Со ДДВ</th>
                    <th scope="col">Акција</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <th scope="row" class="py-auto">{{ $loop->iteration }}</th>                            {{-- <td class="py-auto">{{ $invoice->date->format('d.m.Y') }}</td> --}}
                        <td class="py-auto">{{ date('d.m.Y', strtotime($invoice->date)) }}</td>
                        <td class="py-auto">{{ $invoice->company->name }}</td>
                        <td class="py-auto">{{ $invoice->proforma_number }}</td>
                        <td class="py-auto">{{ number_format($invoice->total_price, 2, ',', '.') }} ден</td>
                        <td>
                            <a href="{{ route('proforma.pdf', $invoice->id) }}" class="btn btn-info">Пдф</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')


@endsection
