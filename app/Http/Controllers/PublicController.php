<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('welcome', compact('categories'));
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $category->id)->get();

        return view('categories.show', compact('products', 'category'));
    }

    public function show_cart() {
        if (Cart::count() < 1) {
            return redirect()->back()->with(['cart_message' => 'Вашата кошничка е празна']);
        }
        // return Cart::content();
        $cart_items = Cart::content();
        // return $cart_items;
        return view('cart_content', compact('cart_items'));
    }
}
