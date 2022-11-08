<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{
//    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selected = [''];

    public function render()
    {
        $products = Product::with('category')->paginate(15);
        $categories = Category::all();
        return view('livewire.filter',
            [
                'categories' => $categories,
                'products' => $products,
                'selected' => $this->selected
            ]);
    }
}
