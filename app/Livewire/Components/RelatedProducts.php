<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class RelatedProducts extends Component
{
    public $productSlug;
    public $relatedProducts = [];
    public function mount($slug)
    {
        $this->productSlug = $slug; // Store the product slug for fetching related products
        $category = \App\Models\Product::where('slug', $this->productSlug)->first()->category;
        $this->relatedProducts = \App\Models\Product::where('category_id', $category->id)
            ->where('active', true)
            ->where('slug', '!=', $this->productSlug) // Exclude the current product
            ->inRandomOrder()
            ->take(4)
            ->get();
    }

    public function addToCart($productId)
    {
        try {
            $product = \App\Models\Product::findOrFail($productId);
            $productSize = $product->productSizes->first() ?? null;
            $productColor = $product->productColors->first() ?? null;
            $this->dispatch(
                "newCartItem",
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => asset('storage/' . $product->images->first()?->url ?? null),
                    'quantity' => 1,
                    'cartId' => Str::random(),
                    'size' => [
                        'id' => $productSize?->id ?? null,
                        'name' => $productSize?->name ?? null,
                    ],
                    'color' => [
                        'id' => $productColor?->id ?? null,
                        'name' => $productColor?->name ?? null,
                    ]
                ]
            );
        } catch (\Exception $e) {
            Log::error("Error adding product to cart: " . $e->getMessage());
            session()->flash('error', 'Failed to add product to cart.');
        }
    }

    public function render()
    {


        return view('livewire.components.related-products', [
            'relatedProducts' => $this->relatedProducts,
            'productSlug' => $this->productSlug,
        ]);
    }
}
