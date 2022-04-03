<?php

namespace App\Http\Controllers;

use App\Models\CustomerInvoice;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Proforma;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function create_label($id)
    {
        $order = Order::findOrFail($id);
        $customer = $order->customer;
        $data = $order->products;
        $html = 'pdf.label';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView($html, ['order' => $order, 'data' => $data, 'customer' => $customer])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function create_invoice($uniqid)
    {
        $invoice = Invoice::where('uniqid', $uniqid)->first();
        $customer = $invoice->company;
        $html = 'pdf.invoice_pdf';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $products = $invoice->articles;

        $vats = $this->separate_vat($products);
        $due_date = Carbon::parse($invoice->date)->addDays($customer->due_days)->format('d.m.Y');
        // return $products;
        $pdf->loadView($html, [
            'invoice' => $invoice,
            'products' => $products,
            'customer' => $customer,
            'due_date' => $due_date,
            'vats' => $vats
        ])->setPaper('a4');
        $name = 'Faktura-' . $invoice->invoice_number . '.pdf';
        return $pdf->download($name);
    }

    public function create_cus_invoice($id)
    {
        $invoice = CustomerInvoice::findOrFail($id);
        $customer = $invoice->customer;
        $html = 'pdf.cus_invoice';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $products = $invoice->articles;

        $vats = $this->separate_vat($products);
        $due_date = Carbon::parse($invoice->date)->addDays($customer->due_days)->format('d.m.Y');
        // return $products;
        $pdf->loadView($html, [
            'invoice' => $invoice,
            'products' => $products,
            'customer' => $customer,
            'due_date' => $due_date,
            'vats' => $vats
        ])->setPaper('a4');
        $name = 'FakturaFL-' . $invoice->invoice_number . '.pdf';
        return $pdf->download($name);
    }

    public function create_proforma($id)
    {
        $invoice = Proforma::findOrFail($id);
        $customer = $invoice->company;
        $html = 'pdf.proforma_pdf';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $products = $invoice->articles;

        $vats = $this->separate_vat($products);
        $due_date = Carbon::parse($invoice->date)->addDays($customer->due_days)->format('d.m.Y');
        // return $products;
        $pdf->loadView($html, [
            'invoice' => $invoice,
            'products' => $products,
            'customer' => $customer,
            'due_date' => $due_date,
            'vats' => $vats
        ])->setPaper('a4');
        $name = 'Profaktura-' . $invoice->proforma_number . '.pdf';
        return $pdf->download($name);
    }


    private function separate_vat($products)
    {
        $test = [];

        $five = [];
        $eighteen = [];
        foreach ($products as $article) {
            $test[] = $article->pivot->single_price * $article->pivot->qty;
            if ($article->tariff_id == 1) {
                $eighteen[] += (($article->pivot->single_price * 1.18) - $article->pivot->single_price) * $article->pivot->qty;
            } elseif ($article->tariff_id == 2) {
                $five[] += (($article->pivot->single_price * 1.05) - $article->pivot->single_price) * $article->pivot->qty;
            }
        }
        return ['five' => array_sum($five), 'eighteen' => array_sum($eighteen)];
    }
}
