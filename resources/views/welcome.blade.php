@extends('layouts.navbar')

@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/1.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/2.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/3.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="mt-4">Категории</h2>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{ route('categories.show', $category->id) }}">
                    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                        <div class="card-header">{{ strtoupper($category->name) }}</div>
                        <div class="card-body">
                            <p class="card-text"><img src="{{ asset('images/1.jpeg') }}" height="150" width="250" alt=""></p>
                        </div>
                    </div>      
                </a>     
                </div>   
            @endforeach
        </div>
    </div>
@endsection
