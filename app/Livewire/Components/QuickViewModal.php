<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class QuickViewModal extends Component
{

    public $productId;

    #[\Livewire\Attributes\On('openQuickViewModal')]
    public function openQuickViewModal($productId){
        $this->productId = $productId;
    }
    public function render()
    {
        $product = Product::where('id', $this->productId)
            ->with(['images', 'category', 'brand', 'productSizes', 'productColors', 'productFeatures'])
            ->first();
        return view('livewire.components.quick-view-modal', [
            'product' => $product,
        ]);
    }
}
