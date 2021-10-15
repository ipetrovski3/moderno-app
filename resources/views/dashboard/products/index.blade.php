@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success">Create new Product</a>
    <a href="{{ route('categories.create') }}" class="btn btn-warning">Create new Category</a>
@stop


@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td><img src=" {{ asset('storage/products'."/".$product->image) }}" style="max-height: 80px; max-width: 80px;"' alt="hello"></td>
                </tr>
            @endforeach

        </tbody>
    </table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
