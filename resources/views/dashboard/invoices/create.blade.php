@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>
@stop


@section('content')
    <form action="">
        @csrf
        <input type="text" name="buyer" value="">
    </form>

@endsection
