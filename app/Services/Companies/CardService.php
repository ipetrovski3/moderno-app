<?php

namespace App\Services\Companies;

use App\Models\InvoicePayment;
use stdClass;

class CardService
{
    public static function generate_card($company)
    {
        $invoices = $company->invoices;
        $finance = [];
        foreach ($invoices as $invoice) {
            $card = new stdClass;
            $card->type = 'outgoing';
            $card->number = $invoice->invoice_number;
            $card->amount = $invoice->total_price;
            $card->date = $invoice->date;
            $finance[] = $card;
        }

        $company_invoices_ids = $company->invoices->pluck('id');
        $invoice_payments = InvoicePayment::where('invoice_id', $company_invoices_ids)->orderBy('paid_date', 'asc')->get();
        foreach ($invoice_payments as $payment) {
            $card = new stdClass;
            $card->type = 'incoming';
            $card->number = $payment->invoice->invoice_number;
            $card->amount = $payment->amount_paid;
            $card->date = $payment->paid_date;
            $finance[] = $card;
        }
         return collect($finance)->sortBy('date');
    }
}
