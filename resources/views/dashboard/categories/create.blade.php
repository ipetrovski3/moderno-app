@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <form action="{{ route('categories.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="image">Product image</label>
            <input type="file" name="image" id="">
        </div>
        <button type="submit" class="btn btn-success"> Save Category </button>
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
