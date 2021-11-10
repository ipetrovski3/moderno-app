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
                    <td><img src=" {{ asset('storage/products' . '/' . $product->image) }}"
                            style="max-height: 80px; max-width: 80px;" alt="hello"></td>
                    <td>
                        <input class="toggle" type="checkbox" {{ $product->active ? 'checked' : '' }} data-toggle="toggle" data-on="ДА"
                            data-off="НЕ" data-onstyle="success" data-offstyle="danger"
                            data-id="{{ $product->id }}">
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script>
        $('.toggle').on('change', function() {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let product_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('activate.product') }}",
                data: {
                    status: status,
                    product_id: product_id
                },
                success: function(data) {
                    $(document).Toasts('create', {
                        class: 'bg-' + data['class'],
                        title: 'Известување',
                        autohide: true,
                        delay: 1300,
                        body: data['body']
                    })

                }
            })

        })
    </script>





@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">

@stop


