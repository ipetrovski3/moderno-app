<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('dashboard.products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $request->file('image')->store('products', 'public');
        $product->image = $request->file('image')->hashName();

        if ($request->has('sizeable'))
            $product->sizeable = true;

        $product->save();

        return redirect()->back()->with(['message' => 'Успешно креиран продукт']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function active_deactive(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->active = $request->status;
        $product->save();

        if ($product->active == true) {
            $body = 'Статусот на производот е променет во активен';
            $class = 'success';
        } else {
            $body = 'Статусот на производот е променет во неактивен';
            $class = 'warning';
        }

        return response()->json(['body' => $body, 'class' => $class]);
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
