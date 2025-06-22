<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class QuickViewModal extends Component
{

    public $productId;
    public $isOpen = false;
    public $product;
    public $amount = 1;
    public $size;
    public $color;


    #[\Livewire\Attributes\On('openQuickViewModal')]
    public function openQuickViewModal($productId, $open)
    {
        $this->isOpen = $open;
        $this->productId = $productId;
    }

    public function selectThisSize($size)
    {
        if(empty($size)) {
            return; // skip empty/null/invalid input
        }
        if ($this->size === $size) {
            $this->size = null; // Deselect if the same size is clicked
            return;
        }
        $this->size = $size;
    }

    public function selectThisColor($color)
    {
        if(empty($color)) {
            return; // skip empty/null/invalid input
        }
        if ($this->color === $color) {
            $this->color = null; // Deselect if the same color is clicked
            return;
        }
        $this->color = $color;
    }

    public function increaseAmount()
    {
        $this->amount++;
    }
    public function decreaseAmount()
    {
        if ($this->amount > 1) {
            $this->amount--;
        }
    }

    public function render()
    {
        $this->product = Product::where('id', $this->productId)
            ->with(['images', 'category', 'brand', 'productSizes', 'productColors', 'productFeatures'])
            ->first();
        return view('livewire.components.quick-view-modal', [
            'product' => $this->product,
        ]);
    }
}
