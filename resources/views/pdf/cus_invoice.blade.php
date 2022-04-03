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
            <h2 style="margin-top: 2px; margin-bottom: 1px; padding: 0em;">МОДЕРНО ГРОУП ДОО</h2>
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
<h4 style="text-align: center; margin: 0em; padding: 0em;">Физички лица | Фактура Бр. {{ $invoice->invoice_number }}</h4>
<table class="customer" width="40%">
    <tr>
        <td><strong>До:</strong></td>
    </tr>
    <tr>
        <td>{{  $invoice->customer->full_name() }}</td>
    </tr>
    <tr>
        <td> {{ $invoice->extra ?? '' }}</td>
    </tr>
    <tr>
        <td>{{ $invoice->customer->address }}</td>
    </tr>
    <tr>
        <td>{{ $invoice->customer->town }}</td>
    </tr>
</table>
<div class="dates">
    <ul>
        <li>Датум: {{ date('d.m.Y', strtotime($invoice->date)) }}</li>
        <li>Рок на плаќање: {{ $due_date }}</li>
    </ul>
</div>


<br />

<table width="100%" style="margin-top: 15mm;">
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
            <td align="right">{{ number_format($product->pivot->single_price, 2, ',', '.') }}</td>
            <td align="center">{{ $product->tariff->value }}</td>
            <td align="right">{{ number_format($product->pivot->single_price * $product->pivot->qty, 2, ',', '.') }}
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
        <td align="right">{{ number_format($invoice->without_vat, 2, ',', '.') }} ден.</td>
    </tr>
    @foreach($vats as $key => $vat)
        <tr>
            <td colspan="6"></td>
            <td align="right">ДДВ {{ $key == 'five' ? '5%' : '18%' }}:</td>
            <td align="right">{{ number_format($vat, 2, ',' , '.') }} ден.</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6"></td>
        <td align="right">Вкупен Износ:</td>
        <td align="right" class="gray">{{ number_format($invoice->total_price, 2, ',', '.') }} ден.</td>
    </tr>
    </tfoot>
</table>

<div
    style="font-size: x-small; text-align: center; width: 100%; position: fixed; bottom: 0; left: 0; width: 100%; z-index: 100; height: 90px; margin-right: 10px">

    <div style="margin-bottom: 50px">
            <span style="padding: 40px; margin-right: 50px; border-top: 1px solid black;"
                  class="signatures">Примил</span>
        <span style="padding: 40px; margin-right: 50px; border-top: 1px solid black;"
              class="signatures">Предал</span>
        <span style="padding: 20px; margin-right: 50px; border-top: 1px solid black;"
              class="signatures">Контролирал</span>
        <span style="padding: 20px; border-top: 1px solid black" class="signatures">Фактурирал</span>
        <p style="float: right; font-size: xx-small; margin-top: 1px; padding-top: 2px">Лице овластено за фактури <br> Бојан Петровски</p>
    </div>
    <hr class="divider">

    <p style="color: #666666; font-size: xx-small">Рекламации се примаат во рок од 3 дена од денот на приемот на стоката со уреден записник. Во случај
        на спор надлежен е Основниот Суд во Скопје. За ненавремено плаќање пресметуваме законска казнена камата
        и еднократен надомест согласно со законот за финанскиска дисциплина (3.000,00 ден)
    </p>

</div>

</body>

</html>
