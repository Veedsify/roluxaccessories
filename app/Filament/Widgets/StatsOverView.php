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
                ->color('primary'),
            Stat::make('Pending Orders', \App\Models\Order::count())
                ->icon('heroicon-o-rectangle-group')
                ->color('danger'),
            Stat::make('Posts', \App\Models\Product::count())
                ->icon('heroicon-o-document-text')
                ->color('success'),
            Stat::make('Articles', \App\Models\Blog::count())
                ->icon('heroicon-o-book-open')
                ->color('warning'),
        ];
    }
}
