<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> --}}
    <style type="text/css">
        * {
            font-family: 'Dejavu Sans', sans-serif;
        }

        hr.divider {
            margin: 0em;
            border-width: 0.7px;
        }

        table.top {
            margin-top: 0em;
            margin-bottom: 0em;
            padding: 0em;
        }

        th.ddv {
            padding: 0em;
            margin: 0em;
        }

        table.customer {
            border: 1px solid #000000;
            border-radius: 5px;
            float: left;
            margin-bottom: 2px;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        ul {
            list-style-type: none;
            font-size: x-small;
        }

    </style>
</head>

<body>
    <table class="top" width="100%">
        <tr style="margin: 0em; padding: 0em;">
            <td valign="top"><img src="{{ public_path('images/logo.jpg') }}" alt="" width="150" /></td>
            <td align="right">
                <h2 style="margin-top: 2px; margin-bottom: 1px; padding: 0em;">Модерно гроуп ДОО</h2>
                <pre>
                    Ул. Петар Манџуков бр. 191, 1000 Скопје
                    ЕДБ: МК4038022518668 ЕМБ: 7563388
                    Тел: +38970662266, Емаил: moderno.mk@yahoo.com
                    Стопанска Банка АД Скопје: 200003931277102
                </pre>
            </td>
        </tr>
    </table>
    <hr class="divider">
    <h4 style="text-align: center; margin: 0em; padding: 0em;">Фактура Бр. {{ $invoice->invoice_number }}</h4>
    <table class="customer" width="40%">
        <tr>
            <td><strong>До:</strong></td>
        </tr>
        <tr>
            <td>{{ $invoice->company->name }}</td>
        </tr>
        <tr>
            <td>{{ $invoice->company->address }}</td>
        </tr>
        <tr>
            <td>{{ $invoice->company->post_code . ',' . $invoice->copmany->town }}</td>
        </tr>
    </table>
    <div class="dates">
        <ul>
            <li>Датум: {{ date('d.m.Y', strtotime($invoice->date)) }}</li>
            <li>Рок на плаќање: {{ $due_date }}</li>
        </ul>
    </div>


    <br />

    <table width="100%" style="margin-top: 5mm;">
        <thead style="background-color: lightgray;">
            <tr>
                <th>Рб</th>
                <th>Ш.</th>
                <th width="40%">Артикл</th>
                <th>Кол.</th>
                <th width="10%">Ед Цена без ДДВ</th>
                <th class="ddv">ДДВ %</th>
                <th>Износ без ДДВ</th>
                <th width="15%">Цена со ДДВ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr style="border-bottom: 1px solid rgb(99, 99, 99);">
                    <th scope="row">{{ $loop->iteration }}.</th>
                    <td align="right">{{ sprintf("%'04d", $product->id) }}</td>
                    <td>{{ $product->name }}</td>
                    <td align="right">{{ number_format($product->pivot->qty) }}</td>
                    <td align="right">{{ number_format($product->pivot->single_price, 2) }}</td>
                    <td align="center">{{ $product->tariff->value }}</td>
                    <td align="right">{{ number_format($product->pivot->single_price * $product->pivot->qty, 2) }}
                    <td align="right">
                        {{ number_format($product->pivot->single_price + ($product->pivot->single_price * $product->tariff->value) / 100, 2) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td align="right">Вкупно без ДДВ:</td>
                <td align="right">{{ number_format($invoice->without_vat, 2) }} ден.</td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td align="right">ДДВ:</td>
                <td align="right">{{ number_format($invoice->vat, 2) }} ден.</td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td align="right">Вкупен Износ:</td>
                <td align="right" class="gray">{{ number_format($invoice->total_price, 2) }} ден.</td>
            </tr>
        </tfoot>
    </table>

    <div
        style="font-size: x-small; text-align: center; width: 100%; position: fixed; bottom: 0; left: 0; width: 100%; z-index: 100; height: 50px; margin-right: 10px">

        <span style="padding: 20px; margin-right: 50px; border-top: 1px solid black;"
            class="signatures">Примил</span>
        <span style="padding: 20px; margin-right: 50px; border-top: 1px solid black;"
            class="signatures">Предал</span>
        <span style="padding: 20px; margin-right: 50px; border-top: 1px solid black;"
            class="signatures">Контролирал</span>
        <span style="padding: 20px; border-top: 1px solid black" class="signatures">Фактурирал</span>

        <hr class="divider">

        <p style="color: #666666">Рекламации се примаат во рок од 3 дена од денот на приемот на стоката со уреден записник. Во случај
            на спор надлежен е Основниот Суд во Скопје. За ненавремено плаќање пресметуваме законска казнена камата
            и еднократен надомест согласно со законот за финанскиска дисциплина (3.000,00 ден)
        </p>

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
