<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        *{ font-family: DejaVu Sans !important;}
      </style>
    <title>Document</title>
</head>

<body>
    <div class="invoice-box"
    style="max-width: 800px;margin: auto;padding: 30px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, .15);font-size: 16px;line-height: 24px;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color: #555;">
    <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
        <tr class="top">
            <td colspan="3" style="padding: 5px;vertical-align: top;">
                <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tr>
                        <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px;">
                            Испратница #: {{ now()->year . '/' . $order->id }}<br>
                            Датум: {{ $order->created_at->format('d.m.Y') }}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr class="information">
            <td colspan="3" style="padding: 5px;vertical-align: top;">
                <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tr>
                        <td style="padding: 5px;vertical-align: top;padding-bottom: 40px;">
                            Купувач: <strong>{{ $customer->full_name() }}</strong><br>
                            Адреса: <strong>{{ $customer->address . ',' . $customer->town }}</strong><br>
                            Телефон: <strong>{{ $customer->phone }}</strong><br>
                            </td>

                            <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 40px;">
                                Модерно МК
                                {{-- John Doe<br>
                                john@example.com --}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td
                    style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Производ
                </td>
                <td
                style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                Количина
            </td>

                <td
                    style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Цена
                </td>
            </tr>
            @foreach ($data as $product)
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                   {{ $product->name . ', ' . $product->pivot->size }}
                </td>
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                    {{ number_format($product->pivot->qty, 2) }}
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid rgba(238, 238, 238, 0.466);">
                    {{  number_format($product->price, 2) }}
                </td>
            </tr>  
            @endforeach
{{--             
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    
                    Hosting (3 months)
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                    $75.00
                </td>
            </tr>

            <tr class="item last">
                <td style="padding: 5px;vertical-align: top;border-bottom: none;">
                    Domain name (1 year)
                </td>

                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: none;">
                    $10.00
                </td>
            </tr> --}}

            <tr class="total">
                <td style="padding: 5px;vertical-align: top;"></td>

                <td
                    style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
                    Total: $385.00
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
