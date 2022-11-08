<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class QuickView extends ModalComponent
{
    public function render()
    {
        return view('livewire.quick-view');
    }
}
