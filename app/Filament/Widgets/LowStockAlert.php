<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockAlert extends BaseWidget
{
    protected static ?int $sort = 10;
    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): ?string
    {
        return 'Low Stock Alert';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()
                    ->where('active', true)
                    ->where('quantity', '<=', 10)
                    ->orderBy('quantity', 'asc')
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

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Stock Level')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state == 0 => 'danger',
                        $state <= 5 => 'warning',
                        default => 'success',
                    })
                    ->formatStateUsing(
                        fn(int $state): string =>
                        $state == 0 ? 'Out of Stock' : "{$state} units"
                    ),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\IconColumn::make('active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->defaultSort('quantity', 'asc')
            ->actions([
                Tables\Actions\Action::make('restock')
                    ->label('Restock')
                    ->icon('heroicon-o-plus-circle')
                    ->color('success')
                    ->url(fn(Product $record): string => "/admin/products/{$record->id}/edit")
                    ->openUrlInNewTab(),
            ])
            ->emptyStateHeading('Great! No low stock items')
            ->emptyStateDescription('All your products have sufficient inventory.')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
