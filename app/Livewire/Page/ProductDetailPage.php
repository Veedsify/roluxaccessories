<?php

namespace App\Livewire\Page;

use App\Models\Product;
use Livewire\Component;

class ProductDetailPage extends Component
{

    public $slug;
    public $productId;
    public $isOpen = false;
    public $product;
    public $amount = 1;
    public $size;
    public $color;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function selectThisSize($size)
    {
        if (empty($size)) {
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
        if (empty($color)) {
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
            'id' => $this->productId,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'image' => $this->product->images->first()->url ?? null,
            'quantity' => $this->amount,
            'size' => $this->size,
            'color' => $this->color,
        ]);

        $this->isOpen = false; // Close the modal after adding to cart
        $this->reset(['amount', 'size', 'color']);
    }

    public function render()
    {
        $this->product = Product::where('slug', $this->slug)
            ->with(['images', 'category', 'brand', 'productSizes', 'productColors', 'productFeatures'])
            ->first();
        return view('livewire.components.quick-view-modal', [
            'product' => $this->product,
        ]);
    }
}
