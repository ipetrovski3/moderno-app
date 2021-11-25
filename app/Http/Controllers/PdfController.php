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
        $data = $order;
        $customer = $data->customer;
        // return $data;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.label', ['data' => $data, 'customer' => $customer]);
        return $pdf->stream();
    }
}
