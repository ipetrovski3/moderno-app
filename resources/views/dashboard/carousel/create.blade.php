@extends('adminlte::page')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <div class="container">
        <div class="col-6">
            <h3>Прикачи слика за главна страна</h3>
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Наслов</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="description">Опис</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <input type="file" class="form-control" name="image">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Додај нова слика</button>
                    <a href="{{ route('images.index') }}" class="btn btn-danger">Назад</a>
                </div>
            </form>
        </div>
    </div>


@endsection
