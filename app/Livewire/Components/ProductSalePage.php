<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class ProductSalePage extends Component
{

    public $productSlug; // Store the product slug for fetching details
    public $productId;
    public int $amount = 1;
    public $size;
    public $color;
    public $product;

    public function mount($slug)
    {
        $this->amount = 1; // Initialize amount to 1
        $this->size = null; // Initialize size to null
        $this->color = null; // Initialize color to null
        $this->productSlug = $slug; // Store the product slug for fetching details
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
        $this->amount++;
        if ($this->amount > $this->product->quantity) {
            $this->amount = $this->product->quantity;
        }
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
            return;
        }

        $this->dispatch("newCartItem", [
            'id' => $this->product->id,
            'name' => $this->product->name,
            'cartId' => Str::random(),
            'price' => $this->product->price,
            'image' => asset('storage/' . $this->product->images->first()?->url ?? null),
            'quantity' => $this->amount,
            'size' => $this->size,
            'color' => $this->color,
        ]);

        $this->reset(['amount', 'size', 'color']);
    }

    public function render()
    {
        $this->product = Product::where('slug', $this->productSlug)
            ->where('active', true)
            ->with(['images', 'category', 'brand', 'productSizes', 'productColors', 'productFeatures'])
            ->first();

        if (!$this->product) {
            abort(404, 'Product not found');
        }

        if (!$this->product->isActive()) {
            abort(404, 'Product is not active');
        }


        return view('livewire.components.product-sale-page', [
            'product' => $this->product,
        ]);
    }
}
