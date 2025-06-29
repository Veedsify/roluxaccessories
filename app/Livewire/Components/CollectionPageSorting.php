<?php

namespace App\Livewire\Components;

use App\Models\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CollectionPageSorting extends Component
{
    public $collections;
    public function mount()
    {
        $this->collections = Collection::whereHas('products', function ($query) {
            $query->where('active', true);
        })
        ->with(['products' => function ($query) {
            $query->orderBy('created_at', 'desc')->limit(4);
        }])
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
        return view('livewire.components.collection-page-sorting', [
            'collections' => $this->collections,
        ]);
    }
}
