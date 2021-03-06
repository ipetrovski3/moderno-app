@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <button type="button" class="btn btn-success" onclick="printDiv('print-container')"> принт</button>
@stop

@section('content')
    <div id="print-container" class="print-container">
        <h1>Набавна вредност на артикли за Фактура бр {{ $invoice->invoice_number }}</h1>
    <h3>{{ $invoice->company->name }}</h3>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">РБ</th>
            <th scope="col">Шифра</th>
            <th scope="col">Набавна Вредност</th>
            <th scope="col">Назив</th>
            <th scope="col">Количина</th>
            <th scope="col">Вк Вредност</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $invoice->articles as $product)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $product->id }}</td>
            <td>{{ number_format($product->cost_price, 2, ',', '.') }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->pivot->qty, 2, ',', '.') }}</td>
            <td>{{ number_format($product->pivot->qty * $product->cost_price, 2, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4"></td>
            <td><strong>Вкупна вредност:</strong></td>
            <td><strong>{{ number_format($total_cost_price, 2, ',', '.') }}</strong></td>
        </tr>
        </tbody>
    </table>
    </div>

@endsection

@section('js')
    <script>
        function printDiv(divName) {
            let printContents = document.getElementById(divName).innerHTML;
            let originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
