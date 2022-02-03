<?php
namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Company;
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
    public function index()
    {
        // $i = new IncomingInvoice;
        //  dd($i->articles);
        // return intval(strval(Carbon::now()->format('y')) . strval(sprintf("%'03d", 1)));
        return view('dashboard.documents.index');
    }

    public function create_material_document(Request $request)
    {
        // return $request->all();
        $doc_id = $request->doc_id;
        $document = $this->material_document_model($doc_id);

        $company_id = $request->company_id;
        $company = Company::findOrFail($company_id);
        $document->company_id = $company->id;
        $document->date = date('Y-m-d', strtotime($request->date));
        $document->save();

        $document->invoice_number = $this->generate_document_number($document->id);
        
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
            } else {
                $product->decrement('stock', $item->qty);
            }

            $product->update(['cost_price' => $item->price * 1.18]);
                                          
            $document->articles()->attach([
                $item->id => ['qty' => $item->qty, 'single_price' => $item->price]
            ]);
        }
        
        $document->save();
        Cart::destroy();
        $this->generate_pdf($document, $company, $doc_id);
        $url = route('home');
        return $url;
    }

    public function create_non_material_document()
    {
    }

    public function select_document(Request $request)
    {
        $document = $request->document;
        $document_name = $this->material_document_type($document);
        Cart::destroy();
        Session::put('document_id', $document);

        return view('dashboard.documents.create')->with([
            'document_id' => $document,
            'document_name' => $document_name
        ]);
        // return response()->json($view);
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

    private function generate_document_number($doc_id)
    {
        return intval(strval(Carbon::now()->format('y')) . strval(sprintf("%'03d", $doc_id)));
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
}