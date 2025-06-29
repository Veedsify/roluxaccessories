<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShippingRateResource\Pages;
use App\Filament\Resources\ShippingRateResource\RelationManagers;
use App\Models\ShippingRate;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShippingRateResource extends Resource
{
    protected static ?string $model = ShippingRate::class;

    protected static ?string $navigationIcon = "heroicon-o-truck";
    protected static ?string $navigationGroup = "Shipping";
    protected static ?string $navigationLabel = "Shipping Rates";
    protected static ?string $modelLabel = "Shipping Rate";
    protected static ?string $pluralModelLabel = "Shipping Rates";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Shipping Rate Details")
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make("state")
                            ->required()
                            ->options(
                                array_combine(
                                    ShippingRate::getNigerianStates(),
                                    ShippingRate::getNigerianStates()
                                )
                            )
                            ->searchable()
                            ->placeholder("Select a Nigerian State")
                            ->helperText(
                                "Select the state for this shipping rate"
                            ),

                        Forms\Components\TextInput::make("rate")
                            ->required()
                            ->numeric()
                            ->prefix("₦")
                            ->step(0.01)
                            ->minValue(0)
                            ->placeholder("0.00")
                            ->helperText("Enter the shipping rate in Naira"),

                        Forms\Components\Toggle::make("is_active")
                            ->required()
                            ->default(true)
                            ->helperText(
                                "Enable or disable this shipping rate"
                            ),

                        Forms\Components\Textarea::make("description")
                            ->columnSpanFull()
                            ->rows(3)
                            ->placeholder(
                                "Optional description for this shipping rate..."
                            )
                            ->helperText(
                                "Optional description for internal reference"
                            ),
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("state")
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color("primary"),

                Tables\Columns\TextColumn::make("rate")
                    ->money("NGN")
                    ->sortable()
                    ->alignEnd(),

                Tables\Columns\IconColumn::make("is_active")
                    ->boolean()
                    ->sortable()
                    ->label("Active"),

                Tables\Columns\TextColumn::make("description")
                    ->limit(50)
                    ->tooltip(function (
                        Tables\Columns\TextColumn $column
                    ): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    })
                    ->placeholder("No description"),

                Tables\Columns\TextColumn::make("created_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label("Created"),

                Tables\Columns\TextColumn::make("updated_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label("Updated"),
            ])
            ->filters([
                Filter::make("active_only")
                    ->query(
                        fn(Builder $query): Builder => $query->where(
                            "is_active",
                            true
                        )
                    )
                    ->default()
                    ->label("Active Rates Only"),

                Filter::make("inactive_only")
                    ->query(
                        fn(Builder $query): Builder => $query->where(
                            "is_active",
                            false
                        )
                    )
                    ->label("Inactive Rates Only"),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make("activate")
                        ->label("Activate Selected")
                        ->icon("heroicon-o-check-circle")
                        ->color("success")
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update(["is_active" => true]);
                            });
                        })
                        ->deselectRecordsAfterCompletion(),

                    Tables\Actions\BulkAction::make("deactivate")
                        ->label("Deactivate Selected")
                        ->icon("heroicon-o-x-circle")
                        ->color("danger")
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update(["is_active" => false]);
                            });
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->defaultSort("state", "asc");
    }

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListShippingRates::route("/"),
            "create" => Pages\CreateShippingRate::route("/create"),
            "edit" => Pages\EditShippingRate::route("/{record}/edit"),
        ];
    }
}
