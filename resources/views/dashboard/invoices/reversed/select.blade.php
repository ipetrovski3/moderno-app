@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Сторно Фактури</h1>
@stop


@section('content')

    <form action="{{ route('open.selected') }}" method="GET">
    <label class="form-label" for="selected">Избери Фактура</label>
    <select name="invoice" class="js-example-basic-single" id="selected">
        @foreach($invoices as $invoice)
        <option value="{{ $invoice->id }}">{{ $invoice->company->name . ' ' . $invoice->invoice_number }}</option>
        @endforeach
    </select>
        <button type="submit">Понатаму</button>
    </form>


@stop


@section('js')
    <script>
        $(document).ready(function() {
            $('#selected').select2();
        });
    </script>
@endsection
