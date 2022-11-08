<?php
namespace App\Http\Controllers;


use App\Services\Documents\DocumentsService;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerInvoice;
use App\Models\IncomingInvoice;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;


class DocumentsController extends Controller
{
    public function create()
    {
        return view('dashboard.documents.index');
    }

    public function create_material_document(Request $request)
    {
        $doc_id = $request->doc_id;
        $document = DocumentsService::material_document_model($doc_id);

        $company_id = $request->company_id;
        if($doc_id == 2){
            $company = Customer::findOrFail($company_id);
            $document->customer_id = $company->id;
        } else {
            $company = Company::findOrFail($company_id);
            $document->company_id = $company->id;
        }
        if ($doc_id != 4 ) {
            $document->date = date('Y-m-d', strtotime($request->date));
            $document->uniqid = uniqid();
        }
        $document->invoice_number = DocumentsService::generate_document_number($document, $doc_id);
        $total_without_ddv = floatval(str_replace('.', '', Cart::subtotal()));
        $total_with_ddv = floatval(str_replace('.', '', Cart::total()));

        $document->total_price = $total_with_ddv;
        $document->vat = intval($total_with_ddv - $total_without_ddv);
        $document->without_vat = $total_without_ddv;
        if ($doc_id != 2) {
            if($doc_id != 4) {
                if ($doc_id == 3) {
                    $document->balance = $total_with_ddv;
                } else {
                    $document->balance = 0 - $total_with_ddv;
                }
                if ($doc_id == 1) {
                    $document->extra = $request->extra;
                }
            }
        }


        $document_items = Cart::content();
        $document->save();

        foreach ($document_items as $item) {
            $product = Product::findOrFail($item->id);
            if ($doc_id == 3 || $doc_id == 4) {
                $product->increment('stock', $item->qty);
                $product->update(['cost_price' => $item->price]);
            } else {
                $product->decrement('stock', $item->qty);
            }
            $document->articles()->attach([
                $item->id => [
                    'qty' => $item->qty,
                    'single_price' => $item->price
                ]
            ]);
        }

        Cart::destroy();
        return route('home');
    }

    public function select_document(Request $request)
    {
        $document = $request->document;
        $document_name = DocumentsService::material_document_type($document);
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
        if(Session::get('document_id') == 2) {
            $company = Customer::findOrFail($request->company_id);
        } else {
            $company = Company::findOrFail($request->company_id);
        }

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
        $doc_id = Session::get('document_id');
        if($doc_id == 2) {
            $company = Customer::findOrFail($request->company_id);
        } else {
            $company = Company::findOrFail($request->company_id);
        }
        $product = Product::findOrFail($request->product_id);

        $set_price = DocumentsService::handle_ddv($product, $ddv, $price);

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
        return view('dashboard.invoices.partials.invoice_preview')
            ->with([
                'all_items' => $all_items,
                'company' => $company,
                'total' => $total,
                'subtotal' => $subtotal,
                'doc_id' => $doc_id,
                'tax' => $tax
            ])->render();
    }


    public function cost_price_per_invoice($id)
    {
        $invoice = Invoice::findOrFail($id);

        $total_cost_price = $invoice->articles->map(function ($article) {
            return $article->cost_price * $article->pivot->qty;
        })->sum();

        return view('dashboard.documents.invoice_cost_price',
            compact('invoice', 'total_cost_price'));
    }
}
