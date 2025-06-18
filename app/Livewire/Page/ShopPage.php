<?php

namespace App\Livewire\Page;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShopPage extends Component
{

    public $display = "grid";
    public $productType = "Shirts";

    public function mount()
    {
        $this->display = "grid"; // Default display mode
        $this->productType = ""; // Default product type filter
    }

    public function render()
    {
        return view('livewire.page.shop-page')->with([
            'productTypes' => $this->getProductTypes(),
        ]);
    }

    public function filterByType($productType)
    {
        $this->productType = $productType;
    }

    public function getProductTypes()
    {
        try {
            $productTypes = \App\Models\ProductType::whereHas('products', function ($query) {
                $query->where('active', true);
            })->get()->map(function ($productType) {
                return [
                    'id' => $productType->id,
                    'name' => $productType->name,
                    'count' => $productType->products->count(),
                ];
            });
            Log::info("Fetched product types: " . $productTypes->count());
            return $productTypes;
        } catch (\Exception $e) {
            Log::error("Error fetching product types: " . $e->getMessage());
            return collect([]);
        }
    }
}
