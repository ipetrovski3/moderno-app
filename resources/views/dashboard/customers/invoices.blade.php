@extends('adminlte::page')
@section('content')

    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Датум</th>
                    <th scope="col">Купувач</th>
                    <th scope="col">Број на фактура</th>
                    <th scope="col">Износ Со ДДВ</th>
                    <th scope="col">Акција</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <th scope="row" class="py-auto">{{ $loop->iteration }}</th>                            {{-- <td class="py-auto">{{ $invoice->date->format('d.m.Y') }}</td> --}}
                        <td class="py-auto">{{ date('d.m.Y', strtotime($invoice->date)) }}</td>

                        <td class="py-auto">{{ $invoice->customer->name }}</td>
                        <td class="py-auto">{{ $invoice->invoice_number }}</td>
                        <td class="py-auto">{{ number_format($invoice->total_price, 2, ',', '.') }} ден</td>
                        <td>
                            <div class="btn-group">

                                <a href="{{ route('customer_invoice.pdf', $invoice->id) }}"
                                   class="btn btn-info text-white"><i class="fas fa-print"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
