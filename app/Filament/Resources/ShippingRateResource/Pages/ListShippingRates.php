<?php

namespace App\Filament\Resources\ShippingRateResource\Pages;

use App\Filament\Resources\ShippingRateResource;
use App\Models\ShippingRate;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;

class ListShippingRates extends ListRecords
{
    protected static string $resource = ShippingRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make("initialize_states")
                ->label("Initialize All Nigerian States")
                ->icon("heroicon-o-map")
                ->color("success")
                ->action(function () {
                    $states = ShippingRate::getNigerianStates();
                    $existingStates = ShippingRate::pluck("state")->toArray();
                    $newStates = array_diff($states, $existingStates);

                    $created = 0;
                    foreach ($newStates as $state) {
                        ShippingRate::create([
                            "state" => $state,
                            "rate" => 0.0,
                            "is_active" => false,
                            "description" => "Auto-created - Please set rate",
                        ]);
                        $created++;
                    }

                    if ($created > 0) {
                        Notification::make()
                            ->title("States Initialized")
                            ->body(
                                "Created {$created} new shipping rate entries. Please update the rates."
                            )
                            ->success()
                            ->send();
                    } else {
                        Notification::make()
                            ->title("No New States")
                            ->body(
                                "All Nigerian states already have shipping rates."
                            )
                            ->info()
                            ->send();
                    }
                })
                ->requiresConfirmation()
                ->modalHeading("Initialize All Nigerian States")
                ->modalDescription(
                    'This will create shipping rate entries for all Nigerian states that don\'t exist yet. They will be created with a rate of ₦0.00 and inactive status.'
                )
                ->modalSubmitActionLabel("Initialize"),
        ];
    }
}
