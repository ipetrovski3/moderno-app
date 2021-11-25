<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use Carbon\Carbon;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('dashboard.invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('dashboard.invoices.create');
    }

    public function store_customer_invoice(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);

        $order = Order::findOrFail($request->order_id);

        $invoice = $customer->invoices()->create(['order_id' => $order->id]);

        $invoice_number = sprintf("%'03d", $invoice->id);
        $invoice_number_with_year = intval(Carbon::now()->format('y') . strval($invoice_number));
        $invoice->number = $invoice_number_with_year;
        $invoice->save();
        return redirect()->back();
    }

    public function store_company_invoice(Request $request)
    {
        $company = Companies::findOrFail($request->company_id);

        
        $order = new Order;

        $invoice = $company->invoices()->create(['order_id' => $order->id]);

        $invoice_number = sprintf("%'03d", $invoice->id);
        $invoice_number_with_year = intval(Carbon::now()->format('y') . strval($invoice_number));
        $invoice->number = $invoice_number_with_year;
        $invoice->save();
        return redirect()->back();
    }


    public function show($number)
    {
        $invoice = Invoice::where('number', $number)->first();
        $products = $invoice->order->products;
        return view('dashboard.invoices.show', compact('invoice', 'products'));
    }
}
