<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Category;
use Filament\Widgets\ChartWidget;

class CategoryDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Products by Category';
    protected static ?int $sort = 7;
    protected static bool $isLazy = false;

    protected function getData(): array
    {
        $categories = Category::select('categories.*')
            ->selectRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND products.active = true) as products_count')
            ->whereRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND products.active = true) > 0')
            ->orderByRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND products.active = true) DESC')
            ->limit(8)
            ->get();

        return [
            'datasets' => [
                [
                    'data' => $categories->pluck('products_count')->toArray(),
                    'backgroundColor' => [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#8B5CF6',
                        '#06B6D4',
                        '#84CC16',
                        '#F97316',
                    ],
                    'borderWidth' => 2,
                    'borderColor' => '#ffffff',
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
