<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Proforma;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProformasController extends Controller
{
    public function index()
    {   $invoices = Proforma::all();
        return view('dashboard.proformas.index', compact('invoices'));
    }

    public function create()
    {
        $products = Product::all();
        $companies = Company::all();

        Cart::destroy();

        return view('dashboard.proformas.create')->with([
            'companies' => $companies,
            'products' => $products
        ]);
    }

    public function store_proforma(Request $request)
    {
        $document = new Proforma;
        $company_id = $request->company_id;
        $company = Company::findOrFail($company_id);
        $document->company_id = $company->id;
        $document->date = date('Y-m-d', strtotime($request->date));
        $document->save();

        $document->proforma_number = $this->generate_document_number($document->id);

        $total_without_ddv = floatval(str_replace('.', '', Cart::subtotal()));
        $total_with_ddv = floatval(str_replace('.', '', Cart::total()));

        $document->total_price = $total_with_ddv;
        $document->vat = intval($total_with_ddv - $total_without_ddv);
        $document->without_vat = $total_without_ddv;
        $document->uniqid = uniqid();

        $document_items = Cart::content();

        foreach ($document_items as $item) {
            $document->articles()->attach([
                $item->id => ['qty' => $item->qty, 'single_price' => $item->price]
            ]);
        }

        $document->save();
        Cart::destroy();
        return route('home');
    }

    public function create_non_material_document()
    {

    }

    public function select_document(Request $request)
    {
        $document = $request->document;
        $document_name = $this->material_document_type($document);
        $products = Product::all();
        if ($document == 2) {
            $companies = Customer::all();
        } else {
            $companies = Company::all();
        }

        Cart::destroy();
        Session::put('document_id', $document);

        return view('dashboard.documents.create')->with([
            'document_id' => $document,
            'document_name' => $document_name,
            'companies' => $companies,
            'products' => $products
        ]);
    }

    public function remove_article(Request $request)
    {
        Cart::remove($request->product);
        $company = Company::findOrFail($request->company_id);
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

    public function select_company(Request $request)
    {
        $company = Company::findOrFail($request->company_id);

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
        $ddv = $request->ddv;
        $price = $request->price;
        $company = Company::findOrFail($request->company_id);
        $product = Product::findOrFail($request->product_id);
        $set_price = $this->handle_ddv($product, $ddv, $price);

        Cart::add(
            $product->id,
            $product->name,
            $request->qty,
            $set_price,
            ['company' => $company->name],
            $product->tariff->value
        );
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $all_items = Cart::content();
        return view('dashboard.proformas.invoice_preview')
            ->with([
                'all_items' => $all_items,
                'company' => $company,
                'total' => $total,
                'subtotal' => $subtotal,
                'tax' => $tax
            ])->render();
    }

    private function generate_document_number($doc_id)
    {
        return intval((Carbon::now()->format('y')) . (sprintf("%'03d", $doc_id)));
    }

    private function handle_ddv($product, $ddv, $price)
    {
        $math = ($product->tariff->value / 100) + 1;
        if ($ddv == 1) {
            return floatval($price) / floatval($math);
        } else {
            return $price;
        }
    }

}
