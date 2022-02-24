<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {

        return view('landing.index-particles');
        $categories = Category::where('active', true)->get();
        $images = CarouselImage::where('active', true)->get();
        return view('public.index', compact('categories'));


        return view('welcome', compact('categories', 'images'));
    }

    public function show($slug) {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->where('active', true)->orderBy('created_at', 'DESC')->get();
        $categories = Category::where('active', true)->get();

        return view('shop.categorie', compact('products', 'category', 'categories'));
    }

    public function show_cart() {
        if (Cart::count() < 1) {
            return redirect()->back()->with(['cart_message' => 'Вашата кошничка е празна']);
        }
        // return Cart::content();
        $cart_items = Cart::content();
        // return $cart_items;
        return view('shop.cart', compact('cart_items'));
    }

    public function remove_from_cart(Request $request) {
        $rowId = $request->rowId;
        $cart = Cart::get($rowId);
        $price = $cart->price * $cart->qty;

        Cart::remove($rowId);

        $cart_count = Cart::count();

        return response()->json(['rowId' => $rowId, 'price' => $price, 'count' => $cart_count ]);
    }

    public function clear_cart() {
        Cart::destroy();
        return redirect()->route('shop.index');
    }

    public function subscribe(Request $request)
    {

    }
}
