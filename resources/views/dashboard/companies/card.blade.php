@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Компании</h1>
@stop

@section('content')
        <div class="container">

        <table class="table w-auto">
            <thead>
            <tr class="my-0 py-0">
                <th class="my-0 py-0">Датум</th>
                <th class="my-0 py-0">Фактура бр.</th>
                <th class="my-0 py-0">Должи</th>
                <th class="my-0 py-0">Побарува</th>
            </tr>
            </thead>
            <tbody>
                @include('dashboard.companies.card_items')
            </tbody>
        </table>
            <div class="float-right">
                <p>tuka e total</p>
            </div>
        </div>
@stop

@section('css')
@stop

@section('js')

@stop
