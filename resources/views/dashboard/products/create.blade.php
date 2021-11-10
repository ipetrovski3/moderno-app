@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Креирај Продукт</h1>
@stop

@section('content')
    <div class="col-6">
        <form action="{{ route('products.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="category">Select Category</label>
                <select class="form-select" name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Назив на продуктот</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label class="form-label" for="price">Цена на продуктот</label>
                <input class="form-control" type="number" name="price" id="">
            </div>
            <div class="form-check">
                <input class="form-check-input" name="sizeable" type="checkbox" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Димензија?
                </label>
            </div>
            <div class="form-group">
                <label class="form-label" for="description">Опис</label>
                <textarea class="form-control" name="description" id=""></textarea>
            </div>
            <div class="form-group">
                <label for="image">Слика</label>
                <input class="form-control" type="file" name="image" id="">
            </div>
            <button type="submit" class="btn btn-success">Потврди</button>
        </form>
    </div>

@stop

@section('css')

@stop

@section('js')
    @if (Session::has('message'))
        <script>
            $(document).Toasts('create', {
                class: 'success',
                title: 'Известување',
                autohide: true,
                delay: 1300,
                body: '{{ session('message')  }}'
            })
        </script>
    @endif
@stop
