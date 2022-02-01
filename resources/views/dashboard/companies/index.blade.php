@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Компании</h1>
@stop

@section('content')
    <table class="table" id="companies_table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Шифра</th>
                <th scope="col">Назив</th>
                <th scope="col">Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#companies_table').DataTable()
        })
    </script>
@stop
