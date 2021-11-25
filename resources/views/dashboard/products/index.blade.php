@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success">Нов Продукт</a>
    <a href="{{ route('categories.create') }}" class="btn btn-warning">Нова Категорија</a>
@stop


@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Категорија</th>
                <th scope="col">Назив</th>
                <th scope="col">Цена</th>
                <th scope="col">Слика</th>
                <th scope="col">Активен</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }} ден</td>
                    {{-- <td><img src="{{ asset('storage/products' . '/' . $product->image) }}"
                            style="max-height: 80px; max-width: 80px;" alt="hello"></td> --}}
                    <td><button class="btn btn-warning img-open"
                            data-image="{{ asset('storage/products' . '/' . $product->image) }}" data-product="{{ $product->name }}"><i
                                class="fas fa-eye"></i></button></td>
                    <td>
                        <input class="toggle" type="checkbox" {{ $product->active ? 'checked' : '' }}
                            data-toggle="toggle" data-on="ДА" data-off="НЕ" data-onstyle="success" data-offstyle="danger"
                            data-id="{{ $product->id }}">
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="title" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="image-src" src="" alt="" style="max-height: 100%; max-width: 100%;">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>

    <script>
        let route = "{{ route('activate.product') }}"
        $('.toggle').on('change', function() {
            let status = $(this).prop("checked") == true ? 1 : 0;
            let id = $(this).data("id");
            activate(route, status, id);
        })

        $('.img-open').on('click', function() {
            let image = $(this).data('image')
            let title = $(this).data('product')
            $('#myModal').on('shown.bs.modal', function() {
                $('#image-src').attr('src', image)
                $('#title').text(title)
            })
            $('#myModal').modal('show')
        })
    </script>
    <script src="{{ asset('js/activate_deactivate.js') }}"></script>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">

@stop
