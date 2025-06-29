<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;

class QuickViewModal extends Component
{

    public $productId;
    public $isOpen = false;
    public $product;
    public $amount = 1;
    public $size;
    public $color;

    public function mount()
    {
        $this->isOpen = false; // Initialize modal as closed
    }


    #[\Livewire\Attributes\On('openQuickViewModal')]
    public function openQuickViewModal($productId, $open)
    {
        $this->isOpen = $open;
        $this->productId = $productId;
    }

    public function selectThisSize($sizeId, $sizeName = null)
    {
        if (empty($sizeId)) {
            return; // skip empty/null/invalid input
        }

        $sizeData = [
            'id' => $sizeId,
            'name' => $sizeName
        ];

        if ($this->size && $this->size['id'] === $sizeId) {
            $this->size = null; // Deselect if the same size is clicked
            return;
        }
        $this->size = $sizeData;
    }

    public function selectThisColor($colorId, $colorName = null)
    {
        if (empty($colorId)) {
            return; // skip empty/null/invalid input
        }

        $colorData = [
            'id' => $colorId,
            'name' => $colorName
        ];

        if ($this->color && $this->color['id'] === $colorId) {
            $this->color = null; // Deselect if the same color is clicked
            return;
        }
        $this->color = $colorData;
    }

    public function increaseAmount()
    {
        $this->amount = (int) $this->amount; // Ensure amount is a valid integer
        $this->amount = min($this->amount + 1, $this->product->quantity); // Ensure amount does not exceed product quantity
    }
    public function decreaseAmount()
    {
        $this->amount = (int) $this->amount; // Ensure amount is a valid integer
        if ($this->amount > 1) {
            $this->amount--;
        }
    }


    public function addToCart()
    {

        if (empty($this->color) && $this->product->productColors->count() > 0) {
            session()->flash('error', 'Please select a color.');
            return;
        }
        if (empty($this->size) && $this->product->productSizes->count() > 0) {
            session()->flash('error', 'Please select a size.');
            return;
        }

        if ($this->amount < 1 || $this->amount > $this->product->quantity) {
            session()->flash('error', 'Please select a valid amount.');
        }

        $this->dispatch("newCartItem", [
            'id' => $this->product->id,
            'cartId' => Str::random(),
            'name' => $this->product->name,
            'price' => $this->product->price,
            'image' => asset('storage/' . $this->product->images->first()?->url ?? null),
            'quantity' => $this->amount,
            'size' => $this->size,
            'color' => $this->color,
        ]);

        $this->isOpen = false; // Close the modal after adding to cart
        $this->reset(['amount', 'size', 'color']);
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
