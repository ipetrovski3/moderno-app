@extends('adminlte::page')

@section('content')
    <div class="container">
        @if ($orders->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Купувач</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Вкупна цена</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Преглед</th>
                    </tr>
                </thead>
                <tbody>
                    @include('dashboard.orders.list')
                </tbody>
            </table>
        @else
            <h4>Во моментов нема активни нарачки со овој статус!</h4>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const queryString = window.location.search;
        $(document).ready(function() {
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

                        console.log(data)
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
