<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShopPageSorting extends Component
{

    public $display = "grid";
    public $productType = "Shirts";
    public $productColor = "";
    public $productSize = [];

    public function mount()
    {
        $this->display = "grid"; // Default display mode
        $this->productType = ""; // Default product type filter
        $this->productColor = ""; // Default product color filter
        $this->productSize = []; // Default product size filter
    }
    public function filterByType($productType)
    {
        $this->productType = $productType;
    }
    public function filterByColor($color)
    {
        $this->productColor = $color;
    }
    public function filterBySize($size)
    {
        if (in_array($size, $this->productSize)) {
            $this->productSize = array_diff($this->productSize, [$size]);
        } else {
            $this->productSize[] = $size;
        }
    }

    public function resetFilters()
    {
        $this->productType = "";
        $this->productColor = "";
    }
    public function getProductSizes()
    {
        try {
            $productSizes = \App\Models\ProductSize::whereHas('products', function ($query) {
                $query->where('active', true);
            })->get()->map(function ($productSize) {
                return [
                    'id' => $productSize->id,
                    'name' => $productSize->name,
                    'count' => $productSize->products->count(),
                ];
            });
            return $productSizes;
        } catch (\Exception $e) {
            Log::error("Error fetching product sizes: " . $e->getMessage());
            return collect([]);
        }
    }

    public function getProductColors()
    {
        try {
            $productColors = \App\Models\ProductColor::whereHas('products', function ($query) {
                $query->where('active', true);
            })->get()->map(function ($productColor) {
                return [
                    'id' => $productColor->id,
                    'name' => $productColor->name,
                    'image' => $productColor->image,
                ];
            });
            return $productColors;
        } catch (\Exception $e) {
            Log::error("Error fetching product colors: " . $e->getMessage());
            return collect([]);
        }
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
            return $productTypes;
        } catch (\Exception $e) {
            Log::error("Error fetching product types: " . $e->getMessage());
            return collect([]);
        }
    }

    public function getProducts()
    {
        try {
            Log::info("Fetching products with filters: Type - {$this->productType}, Color - {$this->productColor}");
            $products = \App\Models\Product::where('active', true)
                ->with(["productColors"])
                ->when($this->productType, function ($query) {
                    return $query->whereHas('productType', function ($q) {
                        $q->where('name', $this->productType);
                    });
                })
                ->when($this->productColor, function ($query) {
                    return $query->whereHas('productColors', function ($q) {
                        $q->where('name', $this->productColor);
                    });
                })
                ->orderBy('id', 'desc')
                ->paginate(12);

            return $products;
        } catch (\Exception $e) {
            Log::error("Error fetching products: " . $e->getMessage());
            return collect([]);
        }
    }

    public function render()
    {
        return view('livewire.components.shop-page-sorting')->with([
            'productTypes' => $this->getProductTypes(),
            'productColors' => $this->getProductColors(),
            'productSizes' => $this->getProductSizes(),
            'products' => $this->getProducts(),
        ]);
    }
}
