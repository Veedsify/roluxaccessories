<?php

namespace App\Filament\Resources\ProductColorResource\Pages;

use App\Filament\Resources\ProductColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductColor extends ViewRecord
{
    protected static string $resource = ProductColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
