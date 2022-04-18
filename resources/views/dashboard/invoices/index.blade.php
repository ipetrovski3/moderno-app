@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">
@stop

@section('content')


    <div class="card">
        <div class="card-body">
            <a href="{{ route('incoming.invoices') }}" class="btn btn-warning">Влезни Фактури</a>
            <a href="{{ route('select.invoice') }}" class="btn btn-outline-dark">Сторно Фактура</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="form-inline mb-3" id="date_filter" method="POST" action="{{ route('filter.invoices.date') }}">
                <label for="from_date">ОД:</label>
                <input type="date" class="form-control mr-2" id="from_date" name="from_date">
                <label for="to_date">ДО:</label>
                <input type="date" class="form-control mr-2" id="to_date" name="to_date">
                <button class="btn btn-success" type="submit">Филтер по датум</button>
            </form>
            <table class="table" id="invoices_table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Датум</th>
                        <th scope="col">Купувач</th>
                        <th scope="col">Број на фактура</th>
                        <th scope="col">Износ Со ДДВ</th>
                        <th scope="col">Акција</th>
                        <th scope="col">Наб. цени</th>
                    </tr>
                </thead>
                <tbody id="render_invoices">
                    @include('dashboard.invoices.partials.invoices_list')
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script>

    </script>


@stop



@section('js')

    <script>
        $(document).on('click', '.delete-invoice', function () {
            let doc_id = $(this).data('id')
            let doc_type = $(this).data('inv_type')
            let parent_elem = $(this).parents('.tr')
            console.log(parent_elem)

            if (confirm('Дали си сигурен?')) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('remove.document') }}",
                    data: {
                        doc_id, doc_type
                    },
                    success: function (data) {
                        parent_elem.remove()
                        Swal.fire({
                            html: data.success,
                            confirmButtonColor: '#b0b435'
                        })

                    }
                })
            }
        })
    </script>
    <script>
        $(document).on('submit', '#date_filter', function (e) {
            e.preventDefault()
            let data = $(this).serialize()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('filter.invoices.date') }}",
                data: data,
                success: function (view) {
                    $('#render_invoices').empty()
                    $('#render_invoices').html(view)
                }
            })
        })
    </script>
    <script>

            $('#invoices_table').DataTable({
                "language": {
                    "lengthMenu": "Прикажи _MENU_ резултати по страна",
                    "zeroRecords": "Нема резултати",
                    "info": "Страна _PAGE_ од _PAGES_",
                    "thousands":      ",",
                    "infoEmpty": "нема инфо",
                    "infoFiltered": "(филтрирано од _MAX_ вкупно резултати)",
                    "search": "Пребарај",
                    "paginate": {
                        "first":      "Прва",
                        "last":       "Последна",
                        "next":       "Следна",
                        "previous":   "Претходна"
                    },
                },
            })
    </script>
@endsection
