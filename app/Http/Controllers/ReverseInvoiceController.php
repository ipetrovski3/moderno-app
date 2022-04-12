<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class ReverseInvoiceController extends Controller
{
    public function select_invoice()
    {
        $invoices = Invoice::all();

        return view('dashboard.invoices.reversed.select', compact('invoices'));
    }

    public function open_selected(Request $request)
    {
        $invoice = Invoice::findOrFail($request->invoice);

        return view('dashboard.invoices.reversed.reverse', compact('invoice'));
    }
}
