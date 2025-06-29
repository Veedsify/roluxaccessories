<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverView extends BaseWidget
{

    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [
            Stat::make('Users', \App\Models\User::count())
                ->icon('heroicon-o-users')
                ->color('primary')
                ->description('Active'),
            Stat::make('Pending Orders', \App\Models\Order::where('status', 'pending')->count())
                ->icon('heroicon-o-rectangle-group')
                ->color('danger')
                ->description('Urgent'),
            Stat::make('Processing Orders', \App\Models\Order::where('status', 'processing')->count())
                ->icon('heroicon-o-cog')
                ->color('info')
                ->description('In Progress'),
            Stat::make('Products', \App\Models\Product::where('active', true)->count())
                ->icon('heroicon-o-document-text')
                ->color('success')
                ->description('Published'),
            Stat::make('Articles', \App\Models\Blog::count())
                ->icon('heroicon-o-book-open')
                ->color('warning')
                ->description('Live'),
        ];
    }
}
