@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Компании</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-success">Креирај нов</a>
@stop

@section('content')
    <table class="table" id="companies_table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Шифра</th>
                <th scope="col">Назив</th>
                <th scope="col">Адреса</th>
                <th scope="col">Инфо</th>
                <th scope="col">Промет</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->address }}</td>
                    <td><a class="btn btn-dark" href="{{ route('companies.show', $company->id) }}">Детали</a> </td>
                    <td>{{ $company->invoices->count() }}</td>
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
            $('#companies_table').DataTable({
                "language": {
                    "lengthMenu": "Прикажи _MENU_ резултати по страна",
                    "zeroRecords": "Нема резултати",
                    "info": "Страна _PAGE_ од _PAGES_",
                    "thousands":      ",",
                    "infoEmpty": "нема инфо",
                    "infoFiltered": "(филтрирано од _MAX_ вкупно резултати)",
                    "search": "Пребарај",
                    "paginate": {
                        "first":      "Прва",
                        "last":       "Последна",
                        "next":       "Следна",
                        "previous":   "Претходна"
                    },
                },
            })
        })
    </script>
@stop
