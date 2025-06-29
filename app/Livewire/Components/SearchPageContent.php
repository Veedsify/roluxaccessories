<?php

namespace App\Livewire\Components;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductType;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class SearchPageContent extends Component
{
    use WithPagination;

    public $query = '';
    public $categoryId = '';
    public $brandId = '';
    public $productTypeId = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $sortBy = 'name';
    public $sortOrder = 'asc';
    public $display = 'grid';

    protected $queryString = [
        'query' => ['except' => '', 'as' => 'q'],
        'categoryId' => ['except' => '', 'as' => 'category_id'],
        'brandId' => ['except' => '', 'as' => 'brand_id'],
        'productTypeId' => ['except' => '', 'as' => 'product_type_id'],
        'minPrice' => ['except' => '', 'as' => 'min_price'],
        'maxPrice' => ['except' => '', 'as' => 'max_price'],
        'sortBy' => ['except' => 'name', 'as' => 'sort_by'],
        'sortOrder' => ['except' => 'asc', 'as' => 'sort_order'],
    ];

    public function mount()
    {
        // Initialize from URL parameters
        $this->fill(request()->only([
            'q',
            'category_id',
            'brand_id',
            'product_type_id',
            'min_price',
            'max_price',
            'sort_by',
            'sort_order'
        ]));
    }

    public function updating($name, $value)
    {
        // Reset page for any filter change except display mode
        if ($name !== 'display') {
            $this->resetPage();
        }
    }

    public function resetPriceFilter()
    {
        $this->reset(['minPrice', 'maxPrice']);
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset([
            'categoryId',
            'brandId',
            'productTypeId',
            'minPrice',
            'maxPrice',
            'query'
        ]);
        $this->resetPage();
    }

    public function addToCart($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $productSize = $product->productSizes->first() ?? null;
            $productColor = $product->productColors->first() ?? null;

            $this->dispatch('newCartItem', [
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
            ]);

            $this->dispatch('notify', message: 'Product added to cart successfully!', type: 'success');
        } catch (\Exception $e) {
            $this->dispatch('notify', message: 'Failed to add product to cart.', type: 'error');
        }
    }

    public function getProductsProperty()
    {
        $productsQuery = Product::query()
            ->with(['category', 'brand', 'productType', 'images'])
            ->where('active', true);

        if (!empty($this->query)) {
            $productsQuery->where(function ($q) {
                $search = mb_strtolower($this->query);
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"]);
            });
        }

        if ($this->categoryId) {
            $productsQuery->where('category_id', $this->categoryId);
        }

        if ($this->brandId) {
            $productsQuery->where('brand_id', $this->brandId);
        }

        if ($this->productTypeId) {
            $productsQuery->where('product_type_id', $this->productTypeId);
        }

        if ($this->minPrice) {
            $productsQuery->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice) {
            $productsQuery->where('price', '<=', $this->maxPrice);
        }

        $validSortColumns = ['name', 'price', 'created_at', 'rate'];
        if (in_array($this->sortBy, $validSortColumns)) {
            $productsQuery->orderBy($this->sortBy, $this->sortOrder);
        }

        return $productsQuery->paginate(12);
    }

    public function getCategoriesProperty()
    {
        return Category::all();
    }

    public function getBrandsProperty()
    {
        return Brand::all();
    }

    public function getProductTypesProperty()
    {
        return ProductType::all();
    }

    public function getPriceRangeProperty()
    {
        return Product::where('active', true)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();
    }

    public function render()
    {
        return view('livewire.components.search-page-content', [
            'products' => $this->products,
            'categories' => $this->categories,
            'brands' => $this->brands,
            'productTypes' => $this->productTypes,
            'priceRange' => $this->priceRange,
        ]);
    }
}
