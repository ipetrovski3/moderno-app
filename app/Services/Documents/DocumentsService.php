<?php

namespace App\Services\Documents;

use App\Models\CustomerInvoice;
use App\Models\IncomingInvoice;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class DocumentsService
{
    public static function generate_document_number($document, $doc_id)
    {
        $class_name = get_class($document);
        $instance = new \ReflectionClass($class_name);
        $all = $instance->newInstance()->all();
        $count = $all->count();
        return $all->last()->invoice_number + 1 ?? intval(strval(Carbon::now()->format('y')) . strval(sprintf("%'03d", $doc_id)));

    }

    public static function handle_ddv($product, $ddv, $price)
    {
        $math = ($product->tariff->value / 100) + 1;
        if ($ddv == 1) {
            return floatval($price) / floatval($math);
        } else {
            return $price;
        }
    }

    public static function material_document_model($number)
    {
        switch ($number) {
            case 1:
                return new Invoice;
                break;
            case 2:
                return new CustomerInvoice;
                break;
            case 3:
                return new IncomingInvoice;
                break;
        }
    }

    public static function material_document_type($number)
    {
        switch ($number) {
            case 1:
                return 'Фактура';
                break;
            case 2:
                return 'Фактура - Физичко Лице';
                break;
            case 3:
                return 'Фактура од Добавувач (Влез)';
                break;
        }
    }
}
