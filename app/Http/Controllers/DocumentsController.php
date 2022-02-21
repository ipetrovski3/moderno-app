<?php
namespace App\Http\Controllers;


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
        $document = $this->material_document_model($doc_id);
//        return $document;

        $company_id = $request->company_id;
        if($doc_id == 2){
            $company = Customer::findOrFail($company_id);
            $document->customer_id = $company->id;
        } else {
            $company = Company::findOrFail($company_id);
            $document->company_id = $company->id;
        }
        $document->date = date('Y-m-d', strtotime($request->date));

        $class_name = get_class($document);
        $instance = new \ReflectionClass($class_name);
        $all = $instance->newInstance()->all();
        $document->invoice_number = $all->last()->invoice_number;

        $document->save();


        $document->invoice_number = $this->generate_document_number($document, $document->id);

        $total_without_ddv = floatval(str_replace(',', '', Cart::subtotal()));
        $total_with_ddv = floatval(str_replace(',', '', Cart::total()));

        $document->total_price = $total_with_ddv;
        $document->vat = intval($total_with_ddv - $total_without_ddv);
        $document->without_vat = $total_without_ddv;
        $document->uniqid = uniqid();

        $document_items = Cart::content();

        foreach ($document_items as $item) {
            $product = Product::findOrFail($item->id);
            if ($doc_id == 3) {
                $product->increment('stock', $item->qty);
                $product->update(['cost_price' => $item->price * 1.18]);
            } else {
                $product->decrement('stock', $item->qty);
            }
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

    private function material_document_model($number)
    {
        switch ($number) {

            case 1:
                return new Invoice;
                break;
            case 2:
                return new CustomerInvoice;
                break;
            case 3:
                return new IncomingInvoice;
                break;
        }
    }

    private function material_document_type($number)
    {
        switch ($number) {
            case 1:
                return 'Фактура';
                break;
            case 2:
                return 'Готовинска Фактура';
                break;
            case 3:
                return 'Фактура од Добавувач (Влез)';
                break;
        }
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

        $set_price = $this->handle_ddv($product, $ddv, $price);
//        return $set_price;
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

    private function generate_document_number($document, $doc_id)
    {
        $class_name = get_class($document);
        $instance = new \ReflectionClass($class_name);
        $all = $instance->newInstance()->all();
        $count = $all->count();
        return $all->last()->invoice_number + 1;

//        if ($count == 1) {
//            return intval(strval(Carbon::now()->format('y')) . strval(sprintf("%'03d", $doc_id)));
//        } else {
//        }
    }

    private function generate_pdf($invoice, $customer, $doc_id)
    {
        $html = 'pdf.invoice_pdf';
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $pdf = App::make('dompdf.wrapper');
        $products = $invoice->articles;
        $pdf->loadView($html, ['invoice' => $invoice, 'products' => $products, 'customer' => $customer])->setPaper('a4');
        $pdf->download($doc_id .'/faktura' . $invoice->invoice_number);
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

    public function cost_price_per_invoice($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('dashboard.documents.invoice_cost_price', compact('invoice'));
    }
}
