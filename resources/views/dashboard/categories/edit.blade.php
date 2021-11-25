@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="col-6">
    <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name">
        </div>
        <div class="form-group">
            <img src="{{ asset('storage/categories/' . $category->image) }}" style="max-width:100%; max-height:100%;" alt="">
            <label for="image">Product image</label>
            <input type="file" class="form-control" name="image">
          </div>
        <button type="submit" class="btn btn-success"> Save Category </button>
    </form>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
