<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Toolbox extends Component
{
    protected $listeners = ['products_counter'];

    public $count;

    public function render()
    {
        $count = $this;
        return view('livewire.toolbox', compact('count'));
    }
}
