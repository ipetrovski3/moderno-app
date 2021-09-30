@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Product</h1>
@stop

@section('content')
    <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" name="price" id="">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id=""></textarea>
        </div>
        <div class="form-group">
            <label for="image">Product image</label>
            <input type="file" name="image" id="">
        </div>
        <button type="submit" class="btn btn-success"> Save Product </button>
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
