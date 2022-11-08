<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'cart_updated' => 'render',
    ];

    public function render()
    {
        $cart_total = \Gloudemans\Shoppingcart\Facades\Cart::total();
        $content = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $cart_count = $content->count();
        return view('livewire.cart',
            compact('content', 'cart_count', 'cart_total'));
    }

    public function remove_from_cart($rowId)
    {
        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId);
    }

}
