@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $company->name }}</h1>
    <a href="{{ route('companies.card', $company->id) }}">Картица на купувач</a>
@stop

@section('content')
<div class="row justify-content-between">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
               <h4>Генерали</h4>
            </div>
            <div class="card-body">
                <p>{{ $company->address }}</p>
                <p>{{ $company->phone }}</p>
                <p>{{ $company->email }}</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4>Финансиски дел</h4>
            </div>
            <div class="card-body">
                <p>Фактури: {{ $invoices->count() }}</p>
                <p>Вкупен Промет: {{ number_format($invoices->pluck('total_price')->sum(), 2, ',', '.') }} ден.</p>
                @php
                $total_balance = $invoices->pluck('balance')->sum();
                @endphp
                <p>Салдо | {{ $total_balance < 0 ? 'Должи: ' . number_format(abs($total_balance), 2, ',', '.') : 'Побарува' . abs($total_balance) }} ден. </p>
            </div>
        </div>
    </div>
</div>
    <table class="table" id="companies_table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Бр.</th>
                <th scope="col">Датум</th>
                <th scope="col">Износ</th>
                <th scope="col">Салдо</th>
                <th scope="col">Датум на уплата</th>
                <th scope="col">Плаќања</th>
            </tr>
        </thead>
        <tbody id="render_body">
            @include('dashboard.companies.payments')
        </tbody>
    </table>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#companies_table').DataTable({
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

        $(document).on('click', '.partial', function ()
        {
            let button_partial = $(this)
            button_partial.attr('hidden', true)
            $(this).siblings('.full').attr('hidden', true)


            let get_form = $(this).siblings('.payment-amount')
            get_form.attr('hidden', false)

            get_form.submit(function (e) {
                e.preventDefault()
                let data = $(this).serializeArray()
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('pay.partial') }}",
                    data: { amount_paid: data[0]['value'], invoice_id:data[1]['value'] },
                    success: function (data) {
                        $('#render_body').html(data)
                        console.log(data)
                        button_partial.attr('hidden', false)
                        button_partial.siblings('.full').attr('hidden', false)
                        get_form.attr('hidden', true)
                        get_form[0].reset()
                    }
                })
            })
        })

        $(document).on('click', )
    </script>
@stop
