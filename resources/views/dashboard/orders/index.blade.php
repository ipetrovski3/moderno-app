@extends('adminlte::page')

@section('content')
    <div class="container">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
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
                console.log(orderId)
                $.ajax({
                    type: "POST",
                    url: "{{ route('status.update') }}",
                    data: {
                        status: status,
                        id: orderId
                    },
                    success: function(data) {

                        console.log(data)

                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            });
        })
    </script>
@endsection
