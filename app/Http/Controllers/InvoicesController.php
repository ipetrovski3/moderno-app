<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use Carbon\Carbon;
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
        $price = $order->total_price;
        $order_products = $order->products;
        $order->invoiced = true;
        $order->save();

        $invoice = $customer->invoices()->create();
        $invoice_number = sprintf("%'03d", $invoice->id);
        $invoice_number_with_year = intval(Carbon::now()->format('y') . strval($invoice_number));
        $invoice->invoice_number = $invoice_number_with_year;
        $invoice->total_price = $price;
        $invoice->vat = $price * 18 / 100;
        $invoice->without_vat = $price - ($price * 18 / 100);
        $invoice->uniqid = $order->uniqid;

        $invoice->save();

        foreach ($order_products as $order_product) {
            $invoice->articles()->attach([
                $order_product->pivot->product_id =>
                ['qty' => $order_product->pivot->qty]
            ]);
        }

        return redirect()->back();
    }

    public function store_company_invoice(Request $request)
    {
        $company = Company::findOrFail($request->company_id);

        $order = new Order;

        $invoice = $company->invoices()->create(['order_id' => $order->id]);

        $invoice_number = sprintf("%'03d", $invoice->id);
        $invoice_number_with_year = intval(Carbon::now()->format('y') . strval($invoice_number));
        $invoice->number = $invoice_number_with_year;
        $invoice->save();

        return redirect()->back();
    }

    public function show($uniqid)
    {
        $invoice = Invoice::where('uniqid', $uniqid)->first();
        // return $invoice;
        $products = $invoice->articles;
        // return $products;
        return view('dashboard.invoices.show', compact('invoice', 'products'));
    }
}
