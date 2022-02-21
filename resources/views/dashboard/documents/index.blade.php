@extends('adminlte::page')

@section('title', 'Материјални Документи')

@section('content_header')
    <h1>Материјални Документи</h1>
@stop


@section('content')
    <button class="btn btn-success mb-3" hidden id="toggle_button"><i class="fas fa-chevron-down"></i></button>
    <div id="toggle_first" class="mb-3">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('document.select') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="document_select">Избери тип на документ</label>
                        <select class="form-control" name="document">
                            <option value="" disabled selected>Избери...</option>
                            <option value="1">1.) Фактура</option>
                            <option value="2">2.) Купувач Во Готово</option>
                            <option value="3">3.) Влезна Фактура од Добавувач</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Понатаму</button>
                </form>
            </div>
        </div>
    </div>

    <hr>
    {{-- render create.blade --}}
    <div class="container" id="documents"></div>
@endsection

@section('js')


@endsection
