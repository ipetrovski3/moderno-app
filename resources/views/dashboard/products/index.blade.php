@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>All Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success">Нов Продукт</a>
    <a href="{{ route('categories.create') }}" class="btn btn-warning">Нова Категорија</a>
@stop


@section('content')

    <table id="products_table" class="table">
        <thead>
            <tr>
                <th scope="col">Шифра</th>
                <th scope="col">Категорија</th>
                <th scope="col">Назив</th>
                <th scope="col">Залиха</th>
                <th scope="col">Прод. Цена</th>
                <th scope="col">Набавна Цена</th>
                <th scope="col">Акција</th>
                <th scope="col">Слика</th>
                <th scope="col">Активен</th>
            </tr>
        </thead>
        <tbody id='render_products'>
            @include('dashboard.products.render_products')
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
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#products_table').DataTable({
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
        })
    </script>

    <script>

        $(document).on('change', '#cat_id', function() {
            let cat_id = $(this).val()
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('select.category') }}",
                data: { cat_id },
                success: function(view) {
                    $('#render_products').empty()
                    $('#render_products').append(view)
                }
            });
        })

        let route = "{{ route('activate.product') }}"
        $('.toggle').on('change', function() {
            let status = $(this).prop("checked") == true ? 1 : 0;
            let id = $(this).data("id");
            activate(route, status, id);
        })

        $(document).on('click', '.img-open', function() {
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

@endsection
