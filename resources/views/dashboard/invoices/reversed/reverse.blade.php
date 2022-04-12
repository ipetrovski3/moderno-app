@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> {{ $invoice->id }}</h1>
@stop


@section('content')

<h1>Што бараш тука уште не е завршено ова!</h1>

@stop


@section('js')
    <script>
        $(document).ready(function() {
            $('#selected').select2();
        });
    </script>
@endsection
