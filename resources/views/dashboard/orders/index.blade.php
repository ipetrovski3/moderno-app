@extends('adminlte::page')

@section('content')
    <div class="container">
        @if ($orders->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th id="igor" scope="col">#</th>
                        <th scope="col">Датум</th>
                        <th scope="col">Купувач</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Вкупна цена</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Опции</th>
                    </tr>
                </thead>
                <tbody>
                    @include('dashboard.orders.list')
                </tbody>
            </table>
        @else
            <h4>Во моментов нема активни нарачки со овој статус!</h4>
        @endif
        <div class="modal" id="showModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Бришење на нарачка</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Дали си сигурен дека сакаш да ја избришеш нарачката а деген?</p>
                    </div>
                    <div class="modal-footer">
                        <form class="delete-form" action="{{ route('order.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="order_id" id="id" value="">
                            <button type="submit" class="btn btn-danger">ДА</button>
                        </form>

                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">НЕ</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @if (session('deleted'))
        <script>
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                let message = "{{ session('deleted') }}"
                Toast.fire({
                    type: 'success',
                    title: message
                })
            })
        </script>
    @endif

    <script>
        const queryString = window.location.search;

        $('#rowClass').dblclick( function() {
            alert("The paragraph was double-clicked");
        });
        $(document).ready(function() {
            $('.delete').on('click', this, function() {
                let orderId = $(this).data('id')
                $('#id').val(orderId)
                $('#showModal').modal('show')
            })

            $('select').on('change', this, function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                let status = $(this).val()
                let orderId = $(this).data('value');
                let element = $(this).parents(':eq(1)')
                $.ajax({
                    type: "POST",
                    url: "{{ route('status.update') }}",
                    data: {
                        status: status,
                        id: orderId
                    },
                    success: function(data) {

                        if (queryString != '?status=all') {
                            element.hide()
                        }
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            });
        })
    </script>
@endsection
