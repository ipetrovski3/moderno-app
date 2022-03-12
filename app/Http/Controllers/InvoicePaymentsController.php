<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoicePaymentsController extends Controller
{
    public function pay_partial(Request $request)
    {
        $invoice = Invoice::findOrFail($request->invoice_id);
        if($invoice->is_paid == true)
            return 'Платена';

        $payment = new InvoicePayment;
        $payment->invoice_id = $invoice->id;
        $payment->amount_paid = $request->amount_paid;
        $payment->paid_date = Carbon::now();
        $payment->save();

        $invoice->increment('balance', $payment->amount_paid);

        $company = Company::findOrFail($invoice->company_id);
        $invoices = $company->invoices;

        if ($invoice->balance >= 0)
            $invoice->update(['is_paid' => true, 'date_paid' => $payment->paid_date]);

        return view('dashboard.companies.payments',  compact('invoices', 'company'))->render();
    }

    public function pay_full(Request $request)
    {

    }
}
