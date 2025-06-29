<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class RevenueStats extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $todayRevenue = Order::whereDate('created_at', Carbon::today())
            ->where('status', '!=', 'cancelled')
            ->sum('total_amount');

        $monthRevenue = Order::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('status', '!=', 'cancelled')
            ->sum('total_amount');

        $yearRevenue = Order::whereYear('created_at', Carbon::now()->year)
            ->where('status', '!=', 'cancelled')
            ->sum('total_amount');

        $lastMonthRevenue = Order::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->where('status', '!=', 'cancelled')
            ->sum('total_amount');

        $monthlyGrowth = $lastMonthRevenue > 0
            ? (($monthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100
            : 0;

        $avgOrderValue = Order::where('status', '!=', 'cancelled')
            ->avg('total_amount');

        $pendingOrdersValue = Order::where('status', 'pending')
            ->sum('total_amount');

        return [
            Stat::make('Today\'s Revenue', '₦' . number_format($todayRevenue, 2))
                ->icon('heroicon-o-currency-dollar')
                ->color('success')
                ->description('Sales today'),

            Stat::make('Monthly Revenue', '₦' . number_format($monthRevenue, 2))
                ->icon('heroicon-o-chart-bar')
                ->color('primary')
                ->description(sprintf(
                    '%s%.1f%% from last month',
                    $monthlyGrowth >= 0 ? '+' : '',
                    $monthlyGrowth
                ))
                ->descriptionIcon($monthlyGrowth >= 0 ? 'heroicon-o-arrow-trending-up' : 'heroicon-o-arrow-trending-down')
                ->chart($this->getMonthlyChart()),

            Stat::make('Yearly Revenue', '₦' . number_format($yearRevenue, 2))
                ->icon('heroicon-o-presentation-chart-line')
                ->color('info')
                ->description('Total this year'),

            Stat::make('Avg Order Value', '₦' . number_format($avgOrderValue, 2))
                ->icon('heroicon-o-calculator')
                ->color('warning')
                ->description('Per order'),

            Stat::make('Pending Orders Value', '₦' . number_format($pendingOrdersValue, 2))
                ->icon('heroicon-o-clock')
                ->color('danger')
                ->description('Awaiting processing'),
        ];
    }

    private function getMonthlyChart(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $revenue = Order::whereDate('created_at', $date)
                ->where('status', '!=', 'cancelled')
                ->sum('total_amount');
            $data[] = $revenue;
        }
        return $data;
    }
}
