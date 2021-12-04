<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class OcProduct extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.shop.oc-product');
    }
}
