@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Нов Коминтент</h1>
@stop

@section('content')
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Име</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="address">Адреса</label>
            <input class="form-control" type="text" name="address" id="address">
        </div>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for="tax_number">Даночен Број</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">МК</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" name="tax_number">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <label for="EDB">Матичен Број</label>
                    <input class="form-control" type="number" name="EDB" id="EDB">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="due_days">Валута (денови)</label>
                    <input class="form-control" type="number" value="{{ $default_due_days }}" name="due_days" id="due_days">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input class="form-control" type="text" name="phone" id="phone">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email">Емаил</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
            </div>
        </div>
        <button type="submit">Креирај</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
