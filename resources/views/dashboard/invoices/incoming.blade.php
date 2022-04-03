@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Влезни Фактури</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Датум</th>
                    <th scope="col">Добавувач</th>
                    <th scope="col">Број на Документ</th>
                    <th scope="col">Износ Со ДДВ</th>
                    <th scope="col">Опции</th>
{{--                    <th scope="col">Акција</th>--}}
{{--                    <th scope="col">Наб. цени</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr class="tr">
                        <th scope="row"
                            class="py-auto">{{ $loop->iteration }}</th> {{-- <td class="py-auto">{{ $invoice->date->format('d.m.Y') }}</td> --}}
                        <td class="py-auto">{{ date('d.m.Y', strtotime($invoice->date)) }}</td>

                        <td class="py-auto">{{ $invoice->company->name }}</td>
                        <td class="py-auto">{{ $invoice->invoice_number }}</td>
                        <td class="py-auto">{{ number_format($invoice->total_price, 2, ',', '.') }} ден</td>
                        <td class="py-auto">
                            <div class="btn-group">
                                <button data-id="{{$invoice->id}}" data-inv_type="incoming"
                                        class="btn delete-invoice btn-danger" type="button" title="Избриши"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

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
