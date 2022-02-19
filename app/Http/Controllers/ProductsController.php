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
        $categories = Category::all();
        return view('dashboard.products.index')
            ->with([
                'products' => $products,
                'categories' => $categories
            ]);
    }

    public function select_category(Request $request)
    {
        $category = Category::find($request->cat_id);
        $products = $category->products;
        // return $products;
        return view('dashboard.products.render_products')->with(['products' => $products])->render();
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ],
        [
            'name.required' => 'Задолжително поле! Немаш внесено име',
            'price.required' => 'Задолжително поле! Немаш внесено цена',
            'description.required' => 'Задолжително поле! Немаш внесено опис',
            'image.required' => 'Задолжително поле! Немаш внесено слика'
        ]);

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

        return view('shop.product', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrfail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
    }

    public function destroy($id)
    {
        //
    }

    public function active_deactive(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $status = $request->status;

        $response = $this->change_status($product, $status);

        return response()->json($response);
    }

    public function add_to_cart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $ddv = $product->tariff->value;
        $new_price = $product->price - ( $ddv / 100 + 1);
        $size = $request->size ?? 0;

        $cartItem = Cart::add($product->id, $product->name, 1, $new_price, ['size' => $size], $ddv);
        $cartItem->associate('Product');

        return response()->json(Cart::count());
    }
}
