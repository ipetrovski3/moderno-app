<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


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
        $invoice->type = 'outgoing';
        $invoice->uniqid = $order->uniqid;

        $invoice->save();

        foreach ($order_products as $order_product) {
            $product = Product::findOrFail($order_product->id);
            $product->stock -= $order_product->qty;
            $product->save();
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

    public function create_incoming_invoice()
    {
        Cart::destroy();
        return view('dashboard.invoices.create_incoming');
    }

    public function store_incoming_invoice(Request $request)
    {
        $company_id = $request->company_id;
        $company = Company::findOrFail($company_id);

        $invoice = $company->invoices()->create();
        $invoice_number = sprintf("%'03d", $invoice->id);
        $invoice_number_with_year = intval(Carbon::now()->format('y') . strval($invoice_number));
        $invoice->invoice_number = $invoice_number_with_year;

        $total_without_ddv = floatval(str_replace(',', '', Cart::subtotal()));
        $total_with_ddv = floatval(str_replace(',', '', Cart::total()));

        $invoice->total_price = $total_with_ddv;
        $invoice->vat = intval($total_with_ddv - $total_without_ddv);
        $invoice->without_vat = $total_without_ddv;
        $invoice->type = 'incoming';
        $invoice->uniqid = uniqid();

        
        $invoice_items = Cart::content();
        
        foreach ($invoice_items as $item) {
            $product = Product::findOrFail($item->id);
            $product->increment('stock', $item->qty);
            $product->update(['cost_price' => $item->price * 1.18]);
            
            $invoice->articles()->attach([
                $item->id => ['qty' => $item->qty, 'single_price' => $item->price * 1.18]
            ]);
        }
        
        $invoice->save();
        Cart::destroy();
    }

    public function select_company(Request $request)
    {
        $company = Company::find($request->company_id);

        return response()->json($company);
    }

    public function select_product(Request $request)
    {
        $product = Product::findOrFail($request->product);
        if ($product == null) {
            return response()->json();
        } else {
            return response()->json(['product' => $product->name]);
        }
    }

    public function invoiced_product(Request $request)
    {

        $price = $request->price;
        $company = Company::findOrFail($request->company_id);
        $product = Product::findOrFail($request->product_id);
        if($product->tariff_id == 2) {
            $without_vat = floatval($price / 1.05);
        } else {
            $without_vat = floatval($price / 1.18);
        }
        Cart::add($product->id, $product->name, $request->qty, $without_vat, ['company' => $company->name], $product->tariff->value);
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $all_items = Cart::content();
        return view('dashboard.invoices.partials.invoice_preview')
            ->with([
                'all_items' => $all_items,
                'company' => $company,
                'total' => $total,
                'subtotal' => $subtotal
            ])->render();

    }
}