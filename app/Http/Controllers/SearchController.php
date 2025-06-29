<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    /**
     * Search for products based on query and filters
     */
    public function searchProducts(Request $request): JsonResponse
    {
        $query = $request->get('q', '');
        $categoryId = $request->get('category_id');
        $brandId = $request->get('brand_id');
        $productTypeId = $request->get('product_type_id');
        $minPrice = $request->get('min_price');
        $maxPrice = $request->get('max_price');
        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');
        $perPage = $request->get('per_page', 12);

        $products = Product::query()
            ->with(['category', 'brand', 'productType', 'images'])
            ->where('active', true);

        // Search in product name and description
        if (!empty($query)) {
            $products->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }

        // Filter by category
        if ($categoryId) {
            $products->where('category_id', $categoryId);
        }

        // Filter by brand
        if ($brandId) {
            $products->where('brand_id', $brandId);
        }

        // Filter by product type
        if ($productTypeId) {
            $products->where('product_type_id', $productTypeId);
        }

        // Filter by price range
        if ($minPrice) {
            $products->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $products->where('price', '<=', $maxPrice);
        }

        // Sorting
        $validSortColumns = ['name', 'price', 'created_at', 'rate'];
        if (in_array($sortBy, $validSortColumns)) {
            $products->orderBy($sortBy, $sortOrder === 'desc' ? 'desc' : 'asc');
        }

        $paginatedProducts = $products->paginate($perPage);

        // Transform products for API response
        $transformedProducts = $paginatedProducts->getCollection()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'origin_price' => $product->originPrice,
                'sale' => $product->sale,
                'new' => $product->new,
                'rate' => $product->rate,
                'description' => $product->description,
                'image' => $product->images->first() ? asset('storage/' . $product->images->first()->url) : null,
                'category' => $product->category ? [
                    'id' => $product->category->id,
                    'name' => $product->category->name
                ] : null,
                'brand' => $product->brand ? [
                    'id' => $product->brand->id,
                    'name' => $product->brand->name
                ] : null,
                'product_type' => $product->productType ? [
                    'id' => $product->productType->id,
                    'name' => $product->productType->name
                ] : null,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'products' => $transformedProducts,
                'pagination' => [
                    'current_page' => $paginatedProducts->currentPage(),
                    'last_page' => $paginatedProducts->lastPage(),
                    'per_page' => $paginatedProducts->perPage(),
                    'total' => $paginatedProducts->total(),
                    'from' => $paginatedProducts->firstItem(),
                    'to' => $paginatedProducts->lastItem(),
                ],
                'filters' => [
                    'query' => $query,
                    'category_id' => $categoryId,
                    'brand_id' => $brandId,
                    'product_type_id' => $productTypeId,
                    'min_price' => $minPrice,
                    'max_price' => $maxPrice,
                    'sort_by' => $sortBy,
                    'sort_order' => $sortOrder,
                ]
            ]
        ]);
    }

    /**
     * Get search suggestions
     */
    public function searchSuggestions(Request $request): JsonResponse
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }

        $suggestions = Product::where('active', true)
            ->where('name', 'LIKE', "%{$query}%")
            ->limit(5)
            ->pluck('name')
            ->toArray();

        return response()->json([
            'success' => true,
            'data' => $suggestions
        ]);
    }

    /**
     * Get filter options for search
     */
    public function getFilterOptions(): JsonResponse
    {
        $categories = Category::get(['id', 'name']);
        $brands = Brand::get(['id', 'name']);
        $productTypes = ProductType::get(['id', 'name']);

        // Get price range
        $priceRange = Product::where('active', true)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        return response()->json([
            'success' => true,
            'data' => [
                'categories' => $categories,
                'brands' => $brands,
                'product_types' => $productTypes,
                'price_range' => [
                    'min' => $priceRange->min_price ?? 0,
                    'max' => $priceRange->max_price ?? 1000
                ]
            ]
        ]);
    }
}
