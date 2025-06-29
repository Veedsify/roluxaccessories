<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class SalesAnalyticsChart extends ChartWidget
{
    protected static ?string $heading = 'Monthly Sales Analytics';
    protected static ?int $sort = 2;
    protected static bool $isLazy = false;

    protected function getData(): array
    {
        $data = $this->getMonthlySalesData();

        return [
            'datasets' => [
                [
                    'label' => 'Sales Amount',
                    'data' => $data['amounts'],
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Orders Count',
                    'data' => $data['counts'],
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'borderColor' => 'rgb(16, 185, 129)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'yAxisID' => 'y1',
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'type' => 'linear',
                    'display' => true,
                    'position' => 'left',
                ],
                'y1' => [
                    'type' => 'linear',
                    'display' => true,
                    'position' => 'right',
                    'grid' => [
                        'drawOnChartArea' => false,
                    ],
                ],
            ],
        ];
    }

    private function getMonthlySalesData(): array
    {
        $months = collect();
        $amounts = collect();
        $counts = collect();

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthStart = $month->copy()->startOfMonth();
            $monthEnd = $month->copy()->endOfMonth();

            $monthlyOrders = Order::whereBetween('created_at', [$monthStart, $monthEnd])
                ->where('status', '!=', 'cancelled');

            $months->push($month->format('M Y'));
            $amounts->push($monthlyOrders->sum('total_amount') ?? 0);
            $counts->push($monthlyOrders->count());
        }

        return [
            'labels' => $months->toArray(),
            'amounts' => $amounts->toArray(),
            'counts' => $counts->toArray(),
        ];
    }
}
