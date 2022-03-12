@foreach ($company->invoices as $invoice)
    <tr class="{{ $invoice->is_paid ? 'text-success' : '' }}">
        <td>{{ $invoice->invoice_number }}</td>
        <td>{{ \Carbon\Carbon::parse($invoice->date)->format('d.m.Y') }}</td>
        <td>{{ number_format($invoice->total_price, 2, ',', '.') }}</td>
        <td>{{ $invoice->balance }}</td>

        @if($invoice->invoice_payments)
            <td>{{ $invoice->invoice_payments->last()->paid_date ?? 'Нема уплата'}}</td>
        @endif
        @if(!$invoice->is_paid)
            <td class="align-center">
                <button type="button" class="btn btn-app full">Цела</button>
                <button type="button" class="btn btn-app partial">Дел</button>
                <form hidden class="payment-amount" action="">
                    <input class="small-box" style="display: table-row !important;" type="number" name="amount" data-invoice="{{ $invoice->id }}">
                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                    <button type="submit" class="btn text-success"><i class="fas fa-check"></i></button>
                    <button type="button" class="btn text-danger"><i class="fas fa-times"></i></button>
                </form>
            </td>
        @else
            <td>Платена на: {{ \Carbon\Carbon::parse($invoice->date_paid)->format('d.m.Y') }}</td>
        @endif
    </tr>
@endforeach
