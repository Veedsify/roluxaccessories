<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Orders')
                ->icon('phosphor-list-bullets')
                ->badge(fn() => $this->getModel()::count()),
            'pending' => Tab::make('Pending')
                ->icon('phosphor-hourglass')
                ->badgeColor('warning')
                ->modifyQueryUsing(
                    fn(Builder $query) => $query->where('status', 'pending')
                )
                ->badge(fn() => $this->getModel()::where('status', 'pending')->count()),
            'confirmed' => Tab::make('Confirmed')
                ->icon('phosphor-check')
                ->modifyQueryUsing(
                    fn(Builder $query) => $query->where('status', 'confirmed')
                )
                ->badgeColor('success')
                ->badge(fn() => $this->getModel()::where('status', 'confirmed')->count()),
            'processing' => Tab::make('Processing')
                ->icon('phosphor-spinner-ball')
                ->modifyQueryUsing(
                    fn(Builder $query) => $query->where('status', 'processing')
                )
                ->badgeColor('info')
                ->badge(fn() => $this->getModel()::where('status', 'processing')->count()),
           
            'shipped' => Tab::make('Shipped')
                ->icon('phosphor-truck')
                ->modifyQueryUsing(
                    fn(Builder $query) => $query->where('status', 'shipped')
                )
                ->badgeColor('purple')
                ->badge(fn() => $this->getModel()::where('status', 'shipped')->count()),
            'delivered' => Tab::make('Delivered')
                ->badge(fn() => $this->getModel()::where('status', 'delivered')->count())
                ->modifyQueryUsing(
                    fn(Builder $query) => $query->where('status', 'delivered')
                )
                ->badgeColor('secondary')
                ->icon('phosphor-package'),
            'cancelled' => Tab::make('Cancelled')
                ->icon('phosphor-x')
                ->modifyQueryUsing(
                    fn(Builder $query) => $query->where('status', 'cancelled')
                )
                ->badgeColor('danger')
                ->badge(fn() => $this->getModel()::where('status', 'cancelled')->count()),
        ];
    }
}
