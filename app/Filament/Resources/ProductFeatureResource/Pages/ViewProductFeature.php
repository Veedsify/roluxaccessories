<?php

namespace App\Filament\Resources\ProductFeatureResource\Pages;

use App\Filament\Resources\ProductFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductFeature extends ViewRecord
{
    protected static string $resource = ProductFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
