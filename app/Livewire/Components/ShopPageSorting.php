<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class ShopPageSorting extends Component
{
    use WithPagination;
    public $display = "grid";
    public $productType = "Shirts";
    public $productColor = "";
    public $productSize = [];
    public $productBrand = "";
    public $sorting = "default"; // Default sorting option

    public function mount()
    {
        $this->display = "grid"; // Default display mode
        $this->productType = ""; // Default product type filter
        $this->productColor = ""; // Default product color filter
        $this->productSize = []; // Default product size filter
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
                    'cartId'=> Str::random(),
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
        if (empty($size)) {
            return; // skip empty/null/invalid input
        }

        // Ensure we’re working with unique values
        $this->productSize = $this->productSize ?? [];

        // Find index of $size using strict comparison
        $index = array_search($size, $this->productSize, true);

        if ($index !== false) {
            // Remove the value while preserving array keys
            unset($this->productSize[$index]);
        } else {
            $this->productSize[] = $size;
        }

        // Reindex to keep the array clean
        $this->productSize = array_values($this->productSize);
    }

    public function productBrands() {}

    public function resetFilters(): void
    {
        $this->productType = "";
        $this->productColor = "";
        $this->productSize = [];
    }

    public function getBrands()
    {
        try {
            $brands = \App\Models\Brand::whereHas('products', function ($query) {
                $query->where('active', true);
            })->get()->map(function ($brand) {
                return [
                    'id' => $brand->id,
                    'name' => $brand->name,
                    'image' => $brand->image,
                    'count' => $brand->products->count(),
                ];
            });
            return $brands;
        } catch (\Exception $e) {
            Log::error("Error fetching brands: " . $e->getMessage());
            return collect([]);
        }
    }
    public function getProductSizes()
    {
        try {
            $productSizes = \App\Models\ProductSize::get()->map(function ($productSize) {
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
                ->when($this->productSize, function ($query) {
                    return $query->whereHas('productSizes', function ($q) {
                        $q->whereIn('name', $this->productSize);
                    });
                })
                ->when($this->productBrand, function ($query) {
                    return $query->whereHas('brand', function ($q) {
                        $q->where('name', $this->productBrand);
                    });
                })
                ->when($this->sorting === 'best_selling', function ($query) {
                    return $query->orderBy('sold', 'desc');
                })
                ->when($this->sorting === 'price_asc', function ($query) {
                    return $query->orderBy('price', 'asc');
                })
                ->when($this->sorting === 'price_desc', function ($query) {
                    return $query->orderBy('price', 'desc');
                })
                ->when($this->sorting === 'newest', function ($query) {
                    return $query->orderBy('created_at', 'desc');
                })
                ->when($this->sorting === 'oldest', function ($query) {
                    return $query->orderBy('created_at', 'asc');
                })
                ->when($this->sorting === 'a_z', function ($query) {
                    return $query->orderBy('name', 'asc');
                })
                ->when($this->sorting === 'default', function ($query) {
                    return $query->orderBy('id', 'desc');
                })
                ->paginate(12);

            Log::info(($this->productSize));
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
            'brands' => $this->getBrands(),
            'products' => $this->getProducts(),
        ]);
    }
}
