<?php

namespace App\Http\Controllers;

use App\Models\IncomingInvoice;
use App\Models\Order;
use App\Models\Invoice;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function create_label($id) {
        $order = Order::findOrFail($id);
        $customer = $order->customer;
        $data = $order->products;
        $html = 'pdf.label';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView($html, ['order' => $order, 'data' => $data, 'customer' => $customer])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function create_invoice($uniqid) {
        $invoice = Invoice::where('uniqid', $uniqid)->first();
        $customer = $invoice->company;
        $html = 'pdf.invoice_pdf';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $products = $invoice->articles;
        // return $products;
        $pdf->loadView($html, ['invoice' => $invoice, 'products' => $products, 'customer' => $customer])->setPaper('a4');
        $name = 'Profaktura_' . $invoice->invoice_number . '.pdf';
        return $pdf->download($name);
    }  
}
