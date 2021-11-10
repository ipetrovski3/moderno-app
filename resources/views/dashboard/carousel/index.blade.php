@extends('adminlte::page')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>


    <div class="container">
        <a href="{{ route('images.create') }}" class="btn btn-success mb-3 mt-2"> Додади нова слика</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Слика</th>
                    <th scope="col">Главна Страна</th>
                    <th scope="col">Акција</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr class="table-active">
                        <th scope="row">{{ $loop->iteration }} </th>
                        <td><img src="{{ asset('storage/main/' . $image->image) }}"
                                style="max-height: 80px; max-width: 80px;" alt=""></td>
                        <td>
                            <input class="toggle" type="checkbox" {{ $image->active == true ? 'checked' : '' }}
                                data-toggle="toggle" data-on="Прикажана" data-off="Исклучена" data-onstyle="success"
                                data-offstyle="danger" data-id="{{ $image->id }}">
                        </td>
                        <td>
                            <form action="{{ route('image.delete', $image->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="promt('Дали си сигурен?')" class="btn btn-danger">Избриши</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>

    <script>
        $('.toggle').on('change', function() {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let image_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('image.activate') }}",
                data: {
                    status: status,
                    image_id: image_id
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
@endsection
