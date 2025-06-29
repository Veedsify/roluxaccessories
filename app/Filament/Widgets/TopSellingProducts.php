<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\OrderDetail;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class TopSellingProducts extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): ?string
    {
        return 'Top Selling Products';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()
                    ->select('products.*')
                    ->selectRaw('COALESCE(SUM(order_details.quantity), 0) as order_details_sum_quantity')
                    ->selectRaw('COALESCE(SUM(order_details.price), 0) as order_details_sum_price')
                    ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
                    ->groupBy('products.id')
                    ->havingRaw('COALESCE(SUM(order_details.quantity), 0) > 0')
                    ->orderByRaw('COALESCE(SUM(order_details.quantity), 0) DESC')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->label('Image')
                    ->getStateUsing(function (Product $record): ?string {
                        return $record->images()->first()?->url;
                    })
                    ->size(50)
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('NGN')
                    ->sortable(),

                Tables\Columns\TextColumn::make('order_details_sum_quantity')
                    ->label('Units Sold')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('order_details_sum_price')
                    ->label('Total Revenue')
                    ->money('USD')
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Stock')
                    ->numeric()
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state > 50 => 'success',
                        $state > 10 => 'warning',
                        default => 'danger',
                    }),
            ])
            ->defaultSort('order_details_sum_quantity', 'desc');
    }
}
