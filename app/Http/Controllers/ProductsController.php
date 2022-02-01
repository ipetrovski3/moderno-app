<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tariff;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('dashboard.products.index')->with(['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $tariffs = Tariff::all();
        return view('dashboard.products.create')
            ->with([
                'categories' => $categories,
                'tariffs' => $tariffs
            ]);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->tariff_id = $request->tariff_id;

        $request->file('image')->store('products', 'public');
        $product->image = $request->file('image')->hashName();

        if ($request->has('sizeable'))
            $product->sizeable = true;

        $product->save();

        return redirect()->back()->with(['message' => 'Успешно креиран продукт']);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function active_deactive(Request $request)
    {
        $product = Product::find($request->id);
        $status = $request->status;

        $response = $this->change_status($product, $status);

        return response()->json($response);
    }

    public function add_to_cart(Request $request)
    {
        $data = $request->all();
        $product = Product::findOrFail($data['product_id']);
        if (isset($data['size'])) {
            $size = $data['size'];
        } else {
            $size = 0;
        }
        $cartItem = Cart::add($product->id, $product->name, $data['qty'], $product->price, ['size' => $size]);
        $cartItem->associate('Product');

        return response()->json(Cart::count());
    }
}
