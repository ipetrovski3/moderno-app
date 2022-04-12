@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>
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

            <table class="table">
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
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr class="tr">
                            <th scope="row" class="py-auto">{{ $loop->iteration }}</th>                            {{-- <td class="py-auto">{{ $invoice->date->format('d.m.Y') }}</td> --}}
                            <td class="py-auto">{{ date('d.m.Y', strtotime($invoice->date)) }}</td>

                            <td class="py-auto">{{ $invoice->company->name }}</td>
                            <td class="py-auto">{{ $invoice->invoice_number }}</td>
                            <td class="py-auto">{{ number_format($invoice->total_price, 2, ',', '.') }} ден</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('invoices.show', $invoice->uniqid) }}"
                                        class="btn btn-success text-white"><i class="fas fa-file-invoice"></i></a>
                                    <a href="{{ route('invoice.pdf', $invoice->uniqid) }}"
                                        class="btn btn-info text-white"><i class="fas fa-print"></i></a>
                                    <button data-id="{{$invoice->id}}" data-inv_type="outgoing"
                                            class="btn delete-invoice btn-danger" type="button" title="Избриши"><i
                                            class="fa fa-times"></i></button>

                                </div>
                            </td>
                            <td><a href="{{ route('invoice.cost', $invoice->id) }}">Набавни цени</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script>

    </script>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4-toggle.css') }}">

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
@endsection
