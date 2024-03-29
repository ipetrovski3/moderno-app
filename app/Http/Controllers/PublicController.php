<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PublicController extends Controller
{
    public function index() {

//        return Cart::content()->first()->options->image;
//        return view('landing.index-particles');
        $products = Product::whereNotNull('option')->get();
        $categories = Category::where('active', true)->get();
        $images = CarouselImage::where('active', true)->get();
        return view('public.index', compact('categories', 'images', 'products'));

        //        return Cart::content();
//        return Cart::content()->first()->options->image;
//        return view('landing.index-particles');
//        $products = Product::where('option', 1)->get()->take(12);
////        return $products;
//        $categories = Category::where('active', true)->get();
//        $images = CarouselImage::where('active', true)->get();
//        return view('new_design.index', compact('categories', 'images', 'products'));
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $category->id)->where('active', true)->orderBy('created_at', 'DESC')->get();
        $categories = Category::where('active', true)->get();

        return view('public.shop', compact('products', 'category', 'categories'));
    }

    public function front_categories()
    {
        $products = Product::with('category')->paginate(15);
        $categories = Category::all();
        return view('new_design.categories.index', compact('products', 'categories'));
    }

    public function show_cart() {
//        if (Cart::count() < 1) {
//            return redirect()->back()->with(['cart_message' => 'Вашата кошничка е празна']);
//        }
        // return Cart::content();
        $cart_items = Cart::content();
        $cart_subtotal = Cart::subtotal();
        $cart_total = Cart::total();
        $cart_tax = Cart::tax();

        // return $cart_items;
        return view('new_design.cart.cart', compact('cart_items'));
    }

    public function remove_from_cart(Request $request) {
        $rowId = $request->rowId;
        $cart = Cart::get($rowId);
        $price = $cart->price * $cart->qty;

        Cart::remove($rowId);
        $cart_items = Cart::content();
        $items_view = view('public.partials.cart_items_partial', compact('cart_items'))->render();
        $summary_view = view('public.partials.summary_cart_partial')->render();
        $cart_count = Cart::count();

        return response()->json(['items_view' => $items_view, 'summary_view' => $summary_view, 'rowId' => $rowId, 'price' => $price, 'count' => $cart_count ]);
    }

    public function clear_cart() {
        Cart::destroy();
        return redirect()->route('shop.index');
    }

    public function subscribe(Request $request)
    {

    }

    public function checkout()
    {
        return view('public.checkout');
    }

    public function update_cart_product(Request $request)
    {
        $rowId = $request->product_id;
        $qty = $request->qty;
        Cart::update($rowId, $qty);

        $cart = Cart::get($rowId);
        $cart_price = ($cart->price + $cart->tax) * $cart->qty;
        $price = number_format($cart_price, 2, ',', '.');

        $view = view('public.partials.summary_cart_partial')->render();

        return ['view' => $view, 'price' => $price];

    }
}
