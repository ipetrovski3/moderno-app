<?php

namespace App\Http\Livewire;

use App\Models\CarouselImage;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomeProducts extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::with('category')->where('option', 1)->get()->take(12);
        $images = CarouselImage::where('active', true)->get();
        $categories = Category::with('products')->has('products')->get();
        return view('livewire.home-products', compact('images', 'categories'));
    }

    public function add_to_cart($product_id)
    {
        $product = Product::findOrFail($product_id);
        $ddv = $product->tariff->value;
        $new_price = $product->price / ($ddv / 100 + 1);
        $size = $request->size ?? 0;
        \Gloudemans\Shoppingcart\Facades\Cart::add(
            $product->id,
            $product->name,
            1,
            $new_price,
            ['size' => $size, 'image' => $product->image],
            $ddv
        );

        $this->emit('cart_updated');
    }

    public function sortProducts($category_id)
    {
       return $this->products = Product::where('category_id', $category_id)->get();
    }
}
