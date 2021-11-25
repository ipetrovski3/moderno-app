@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Сите Категории</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-warning">Нова Категорија</a>
@stop


@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Назив</th>
                <th scope="col">Слика</th>
                <th scope="col">Активен</th>
                <th scope="col">Акција</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td><img src=" {{ asset('storage/categories/' . $category->image) }}"
                            style="max-height: 80px; max-width: 80px;" alt="hello"></td>
                    <td>
                        <input class="toggle" type="checkbox" {{ $category->active ? 'checked' : '' }} data-toggle="toggle" data-on="ДА"
                            data-off="НЕ" data-onstyle="success" data-offstyle="danger"
                            data-id="{{ $category->id }}">
                    </td>
                    <td> <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Едитирај</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script>
        let route = "{{ route('activate.category') }}"
        $('.toggle').on('change', function() {
            let status = $(this).prop("checked") == true ? 1 : 0;
            let id = $(this).data("id");
            activate(route, status, id);
        })
    </script>

    <script src="{{ asset('js/activate_deactivate.js') }}"></script>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">
@stop


