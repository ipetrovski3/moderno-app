@extends('adminlte::page')

@section('content')
    <div class="container">
        <section id="loading">
            <div id="loading-content"></div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th id="igor" scope="col">#</th>
                        <th scope="col">Име и презиме</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Број на нарачки</th>
                        <th scope="col">Вкупен промет</th>
                        <th scope="col">Контакт</th>
                    </tr>
                </thead>
                <tbody>
                    @include('dashboard.customers.list')
                </tbody>
            </table>

            <div class="modal" id="showModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Контактирај клиент</h5>
                        </div>
                        <div class="modal-body">
                            <form class="email-form" method="POST">
                                <label for="title">Наслов</label>
                                <input type="text" id="title" value="" name="title" class="form-control">
                                <label for="message" class="form-label mt-2">Порака</label>
                                <textarea class="form-control" value="" name="message" id="message" cols="60"
                                    rows="10"></textarea>
                                <input type="hidden" name="customer_id" id="customer_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button id="submit_form" class="btn btn-success">Испрати Емаил</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Исклучи</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-secondary').on('click', function() {
                $('#showModal').modal('show')
                let customer_id = $(this).data('id')
                $('#customer_id').val(customer_id)
            })

            $('#submit_form').on('click', this, function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                $(document.body).css({
                    'cursor': 'wait'
                })
                let customer_id = $('#customer_id').val()
                let title = $('#title').val()
                let message = $('#message').val()
                $('#submit_form').attr('disabled', true)

                $.ajax({
                    type: 'POST',
                    url: "{{ route('contact_customer') }}",
                    data: {
                        customer_id,
                        title,
                        message
                    },
                    success: (function(data) {
                        $('#showModal').modal('hide')
                        $(document.body).css({
                            'cursor': 'default'
                        })
                        $('#submit_form').attr('disabled', false)
                        $(function() {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            let message = "Испратен емаил до " + data
                            Toast.fire({
                                type: 'success',
                                title: message
                            })
                        })
                    })
                })
            })
        })
    </script>


@endsection
