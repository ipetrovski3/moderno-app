
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Document</title>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> --}}
        <style>
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }
    
    
            body {
                margin: 0px;
            }
    
            a {
                color: #5D6975;
                text-decoration: underline;
            }
    
            body {
                position: relative;
    
                font-size: 12px;
            }
    
            header {
                margin-bottom: 5px;
            }
    
    
            h3 {
                border-top: 1px solid #5D6975;
                border-bottom: 1px solid #5D6975;
                font-size: 2.4em;
                line-height: 1.4em;
                font-weight: normal;
                text-align: center;
            }
    
            #project {
                float: left;
            }
    
            #project span {
                text-align: right;
                width: 52px;
                margin-right: 10px;
                display: inline-block;
                font-size: 0.8em;
            }
    
            #company {
                float: right;
                text-align: right;
            }
    
            #project div,
            #company div {
                white-space: nowrap;
            }
    
            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 5px;
            }
    
            table tr:nth-child(2n-1) td {
                background: #F5F5F5;
            }

            table th {
                border-bottom: 1px solid #C1CED9;
                font-weight: bold;
            }
    
            table .service {
               
                margin-right: 1px;
            }
    
            table .desc {
               
            }
    
            table td {
                padding: 1px;
                text-align: center;
            }
    
            #notices .notice {
                color: #5D6975;
                font-size: 1.2em;
            }
    
    
            footer {
                color: #5D6975;
                width: 100%;
                height: 30px;
                position: absolute;
                bottom: 0;
                border-top: 1px solid #C1CED9;
                padding: 8px 0;
                text-align: center;
            }
    
        </style>
    </head>
    
    <body>
    
        <div style="font-family: 'Dejavu Sans', sans-serif;">
    
            <header class="clearfix">
                <div id="logo">
                    <div style="width: 20%; float:left">
                        <img src="{{ public_path('images/modernologo.jpg') }}" style="height: 70px; witdh: 70px" alt="">
                    </div>
                    <div style="width: 80%; float: right">
                        Модерно гроуп ДОО, ул. Петар Манџуков бр. 191, 1000 Скопје <br>
                        ЕДБ: МК4038022518668 ЕМБ: 7563388 <br>
                        Тел: +38970662266, Емаил: moderno.mk@yahoo.com <br>
                        Стопанска Банка АД Скопје: 200003931277102
                    </div>
                </div>
                <h3>Профактура бр: {{ $invoice->invoice_number }}</h3>
    
                <div id="project">
                    <div>ДО: <strong>{{ $customer->name }}</strong></div>
                    <div>АДРЕСА: <strong>{{ $customer->address }}</strong></div>
                    {{-- <div>ЕМАИЛ: <strong>{{ $customer->email }}</strong></div> --}}
                    <div>ДАТУМ: <strong>{{ $invoice->created_at->format('d.m.Y') }}</strong></div>
                    {{-- <div>ДОСПЕВА: <strong>{{  $invoice->created_at->addDays($customer->due_days)->format('d.m.Y')  }}</strong></div> --}}
                </div>
            </header>
            <main>
                <table style="width: 100%">
                    <col style="width:5%">
                    <col style="width:50%">
                    <col style="width:5%">
                    <col style="width:5%">
                    <col style="width:15%">
                    <col style="width:5%">
                    <col style="width:15%">
                    <thead>
                        <tr>
                            <th>РБ</th>
                            <th>Артикл</th>
                            <th>Ед. м</th>
                            <th>Кол.</th>
                            <th>Ед. Цена</th>
                            <th>ДДВ %</th>
                            <th>Вредност без ДДВ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $product->name }}</td>
                                <td>бр.</td>
                                <td>{{ number_format($product->pivot->qty) }}</td>
                                <td>{{ number_format($product->pivot->single_price, 2) }}</td>
                                <td>{{ $product->tariff->name }}</td>
                                <td>
                                    {{ number_format($product->pivot->single_price * $product->pivot->qty, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <table>
                    <thead>
                        <tr>
                            <th class="service">РБ</th>
                            <th class="desc">Артикл</th>
                            <th>Ед. м</th>
                            <th>Кол.</th>
                            <th>Ед. Цена без ДДВ</th>
                            <th>ДДВ %</th>
                            <th>Вредност без ДДВ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="service">{{ $loop->iteration }}.</td>
                                <td class="desc">{{ $product->name }}</td>
                                <td class="desc">бр.</td>
                                <td class="unit">{{ number_format($product->pivot->qty) }}</td>
                                <td class="qty">{{ number_format($product->pivot->single_price, 2) }}</td>
                                <td class="qty">{{ $product->tariff->name }}</td>
                                <td class="total">
                                    {{ number_format($product->pivot->single_price * $product->pivot->qty, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                <div style="text-align: right; margin-top: 0px; height: 200px;">
                    <div style="width: 70%; float: left;"></div>
                    <div style="width: 30%; float: right;">
                        <p style="border-bottom: 1px solid #C1CED9">Вкупно без ДДВ:
                            <strong>{{ number_format($invoice->without_vat, 2) }}</strong>
                        </p>
                        <p style="border-bottom: 1px solid #C1CED9">ДДВ:
                            <strong>{{ number_format($invoice->vat, 2) }}</strong>
                        </p>
                        <p>Вкупен Износ: <strong>{{ number_format($invoice->total_price, 2) }} ден.</strong></p>
                    </div>
                </div>
                <div>
                    <div id="notices">
                        {{-- <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div> --}}
                    </div>
                </div>
            </main>
            <footer>
                Рок на плаќање на фактурата е 60 дена. Во Случај на задоцнување ќе пресметаме затезна камата.
                Рекламации се примаат во рок од 7 дена. Во случај на спор надлежен е судот во Скопје.
            </footer>
        </div>
    
        {{-- <div id="invoice" style="height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
        font-family: 'Dejavu Sans', sans-serif;">
            <div class="card">
                <div class="card-header p-2">
                    <p class="text-center mb-0">
                        <img src="{{ asset('images/moderno-logo.png') }}" style="height: 60px; witdh: 60px" alt="">
                    </p>
                    <p class="text-center mb-0">
                        Модерно гроуп ДОО, ул. Петар Манџуков бр. 191, 1000 Скопје <br>
                        ЕДБ: МК4038022518668 ЕМБ: 7563388 <br>
                        Тел: +38970662266, Емаил: moderno.mk@yahoo.com <br>
                        Стопанска Банка АД Скопје: 200003931277102
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
                            <h4 class="text-dark">
                                {{ $invoice->invoicable_type == 'App\Models\Customer' ? 'До: ' . Helpers::latin_to_cyrillic($invoice->invoicable->full_name()) : 'Од: ' . $invoice->invoicable->name }}
                            </h4>
                            <div>
                                {{ Helpers::latin_to_cyrillic($invoice->invoicable->address . ', ' . $invoice->invoicable->town) }}
                            </div>
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
                                        <td class="py-1" class="">
                                            {{ number_format($product->pivot->qty, 2) }}</td>
                                        <td class="py-1">
                                            {{ number_format(Helpers::without_vat($product->cost_price), 2) }}</td>
                                        <td class="py-1">{{ number_format($product->cost_price, 2) }}</td>
                                        <td class="py-1 float-right">
                                            {{ number_format($product->cost_price * $product->pivot->qty, 2) }}</td>
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
                            <p class="text-center pt-0 mt-0">Фактурирал:
                                {{ Helpers::latin_to_cyrillic(Auth::user()->name) }}
                            </p>
                        </div>
                        <div class="col-3">
                            <p class="mb-0">_______________</p>
                            <p class="text-center pt-0 mt-0">Директор</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    
    </body>
    
    </html>
    