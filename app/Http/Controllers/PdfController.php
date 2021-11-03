<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function create_label() {
        $pdf = \App::make('dompdf.wrapper');
        $data = 'Igor';
        $pdf->loadView('pdf.label', $data);
        return $pdf->download('invoice.pdf');
    }
}
