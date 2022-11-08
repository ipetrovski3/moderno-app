<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItems extends Component
{
    public $quantity = [];
    public $cart_content;
    public $cargo;

    public function mount()
    {
        $this->cargo = 130;
        $this->cart_content = \Gloudemans\Shoppingcart\Facades\Cart::content();
        foreach ($this->cart_content as $content) {
            $this->quantity[$content->rowId] = $content->qty;
        }
    }

    public function render()
    {
        $cart_total = \Gloudemans\Shoppingcart\Facades\Cart::total();
        $formated = str_replace('.', '', $cart_total);
        $grand_total = number_format(floatval($formated) + $this->cargo, 2, ',', '.');
        $cart_items = \Gloudemans\Shoppingcart\Facades\Cart::content();
        return view('livewire.cart-items', compact(
            'cart_items',
            'cart_total',
            'grand_total'
        ));
    }

    public function update_cart()
    {
        foreach ($this->quantity as $rowId => $qty)
        {
            \Gloudemans\Shoppingcart\Facades\Cart::update($rowId, $qty);
        }
    }
}
