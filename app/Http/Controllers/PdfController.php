<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        $pdf->loadView($html, ['order' => $order, 'data' => $data, 'customer' => $customer])->setPaper('a', 'landscape');
        return $pdf->stream();
    }

    public function create_invoice() {
        PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
    }
}
