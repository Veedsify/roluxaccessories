<?php

namespace App\Filament\Resources\ProductSizeResource\Pages;

use App\Filament\Resources\ProductSizeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductSize extends ViewRecord
{
    protected static string $resource = ProductSizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
