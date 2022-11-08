<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProductModal extends Component
{
    public function render()
    {
        return view('livewire.show-product-modal');
    }

    public function show_product($product_id)
    {
        $this->dispatchBrowserEvent('showProduct');
    }
}
