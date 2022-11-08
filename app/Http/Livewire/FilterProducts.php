<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filters = [
        'categories' => []
    ];

    public $counter;
    public $links = true;
    public $test;

    public function mount()
    {
        $this->counter = Product::count();
    }

    public function hydrate()
    {
        $this->counter = 1239;
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::with('category')->paginate(15);
        $products_count = $this->counter;

        return view('livewire.filter-products',
            [
                'products' => $products,
                'categories' => $categories,
                'products_count' => $this->counter
            ]);
    }

    public function getResultsProperty()
    {
        $this->filters['categories'] = array_filter($this->filters['categories']);

        if(empty($this->filters['categories'])) {
            $this->links = true;

            $products = Product::with('category');
            $this->test = $products->count();
            return Product::with('category')->paginate(15);
        } else {
            $products = Product::whereIn('category_id', array_keys($this->filters['categories']));
            $this->counter = $products->count();
//            dd($this->counter);

            $this->counter > 15 ? $this->links = true : $this->links = false;
            return $products->paginate(15);

        }
    }

    public function getCategoriesProperty()
    {
        return Category::all();
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
}
