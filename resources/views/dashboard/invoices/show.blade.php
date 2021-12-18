@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>
    <p><button id="print">Печати</button></p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
@stop

@section('content')
    <div id="invoice" style="height: 842px;
    width: 595px;
    /* to centre page on screen*/
    margin-left: auto;
    margin-right: auto;">
        <div class="card">
            <div class="card-header p-2">
                <p class="text-center">
                    Модерно ДОО, ул. Народни Херои 13б, 1000 Скопје <br>
                    ЕДБ: МК444546531256 ЕМБ: 431256 <br>
                    Тел: 070 222 222, Емаил: info@moderno.com.mk <br>
                    НЛБ Тутунска банка сметка: 3000254564564564565
                </p>
            </div>
            <div class="card-body">
                <h3 class="text-center">{{ $invoice->invoicable_type == 'App\Models\Customer' ? 'Готовинска' : '' }}
                    Фактура бр: {{ $invoice->invoice_number }} </h3>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4></h4>
                        <div>Датум: {{ $invoice->created_at->format('d.m.Y') }}</div>
                        @if ($invoice->invoicable_type == 'App\Models\Company')
                            <div>Рок за плаќање: {{ $invoice->created_at->addDays(60)->format('d.m.Y') }}</div>
                        @endif
                    </div>
                    <div class="col-sm-6 ">
                        <h4 class="text-dark">До: {{ Helpers::latin_to_cyrillic($invoice->invoicable->full_name()) }}</h4>
                        <div>{{ Helpers::latin_to_cyrillic($invoice->invoicable->address . ', ' . $invoice->invoicable->town) }}</div>
                        <div>Емаил: {{ $invoice->invoicable->email }}</div>
                        <div>Телефон: {{ $invoice->invoicable->phone }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th class="col-4">Производ</th>
                                <th class="col-1">Кол.</th>
                                <th class="col-2">Цена без ДДВ</th>
                                <th class="col-2">Цена со ДДВ</th>
                                <th class="col-2">Вкупен Износ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="px-0">
                                    <td class="py-1">{{ $loop->iteration . '.' }}</td>
                                    <td class="py-1">{{ $product->name }}</td>
                                    <td class="py-1" class="">{{ number_format($product->pivot->qty, 2) }}</td>
                                    <td class="py-1">{{ number_format(Helpers::without_vat($product->price), 2) }}</td>
                                    <td class="py-1">{{ number_format($product->price, 2) }}</td>
                                    <td class="py-1 float-right">{{ number_format($product->price * $product->pivot->qty, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-6 col-sm-6 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="py-1">
                                        <strong class="text-dark">Вкупно без ДДВ</strong>
                                    </td>
                                    <td class="float-right py-1">{{ number_format($invoice->without_vat, 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <strong class="text-dark">ДДВ (18%)</strong>
                                    </td>
                                    <td class="float-right py-1">{{ number_format($invoice->vat, 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <strong class="text-dark">Вкупно со ДДВ</strong>
                                    </td>
                                    <td class="float-right py-1">
                                        <strong class="text-dark">{{ number_format($invoice->total_price, 2) }}
                                            ден.</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-3">
                        <p class="mb-0">_______________</p>
                        <p class="text-center pt-0 mt-0">Примил</p>
                    </div>
                    <div class="col-3">
                        <p class="mb-0">_______________</p>
                        <p class="text-center pt-0 mt-0">Издал</p>
                    </div>
                    <div class="col-3">
                        <p class="mb-0">_______________</p>
                        <p class="text-center pt-0 mt-0">Фактурирал: {{ Helpers::latin_to_cyrillic(Auth::user()->name) }}
                        </p>
                    </div>
                    <div class="col-3">
                        <p class="mb-0">_______________</p>
                        <p class="text-center pt-0 mt-0">Директор</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {
            let invoice = $('#invoice')
            $('#print').on('click', function() {
                invoice.print()
            })
        })
    </script>
@stop
