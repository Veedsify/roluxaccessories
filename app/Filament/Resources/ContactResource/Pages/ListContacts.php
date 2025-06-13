<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All')
                ->badge(function () {
                    return Contact::count();
                }),
            'responded' => Tab::make('Responded')
                ->badgeColor('success')
                ->badge(fn() => Contact::where('is_responded', true)->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_responded', true)),
            'unresponsed' => Tab::make('Unresponded')
                ->badgeColor('warning')
                ->badge(fn() => Contact::where('is_responded', false)->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_responded', false)),
        ];
    }
}
