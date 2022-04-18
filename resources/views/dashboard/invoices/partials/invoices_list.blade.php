
@foreach ($invoices as $invoice)
    <tr class="tr">
        <th scope="row" class="py-auto">{{ $loop->iteration }}</th>                            {{-- <td class="py-auto">{{ $invoice->date->format('d.m.Y') }}</td> --}}
        <td class="py-auto">{{ date('d.m.Y', strtotime($invoice->date)) }}</td>

        <td class="py-auto">{{ $invoice->company->name }}</td>
        <td class="py-auto">{{ $invoice->invoice_number }}</td>
        <td class="py-auto">{{ number_format($invoice->total_price, 2, ',', '.') }} ден</td>
        <td>
            <div class="btn-group">
                <a href="{{ route('invoices.show', $invoice->uniqid) }}"
                   class="btn btn-success text-white"><i class="fas fa-file-invoice"></i></a>
                <a href="{{ route('invoice.pdf', $invoice->uniqid) }}"
                   class="btn btn-info text-white"><i class="fas fa-print"></i></a>
                <button data-id="{{$invoice->id}}" data-inv_type="outgoing"
                        class="btn delete-invoice btn-danger" type="button" title="Избриши"><i
                        class="fa fa-times"></i></button>

            </div>
        </td>
        <td><a href="{{ route('invoice.cost', $invoice->id) }}">Набавни цени</a> </td>
    </tr>
@endforeach

