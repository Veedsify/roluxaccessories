<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Brand;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class QuickMetrics extends BaseWidget
{
    protected static ?int $sort = 9;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $totalCustomers = User::count();
        $featuredProducts = Product::where('is_featured', true)->where('active', true)->count();
        $averageRating = ProductRating::avg('rating');
        $activeBrands = Brand::where('is_active', true)->count();
        $activeCategories = Category::where('is_active', true)->count();
        $outOfStockProducts = Product::where('quantity', 0)->where('active', true)->count();

        return [
            Stat::make('Total Customers', number_format($totalCustomers))
                ->icon('heroicon-o-user-group')
                ->color('success')
                ->description('Registered users'),

            Stat::make('Featured Products', $featuredProducts)
                ->icon('heroicon-o-star')
                ->color('warning')
                ->description('Highlighted items'),

            Stat::make('Average Rating', number_format($averageRating, 1) . '/5')
                ->icon('heroicon-o-heart')
                ->color('primary')
                ->description('Customer satisfaction'),

            Stat::make('Active Brands', $activeBrands)
                ->icon('heroicon-o-building-storefront')
                ->color('info')
                ->description('Available brands'),

            Stat::make('Categories', $activeCategories)
                ->icon('heroicon-o-squares-2x2')
                ->color('success')
                ->description('Product categories'),

            Stat::make('Out of Stock', $outOfStockProducts)
                ->icon('heroicon-o-exclamation-triangle')
                ->color($outOfStockProducts > 0 ? 'danger' : 'success')
                ->description($outOfStockProducts > 0 ? 'Need attention' : 'All stocked'),
        ];
    }
}
