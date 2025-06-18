<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'phosphor-map-pin';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Address Details')
                    ->description('Manage the address details.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->searchable()
                            ->preload(6)
                            ->label('User')
                            ->relationship('user', 'name'),
                        Forms\Components\TextInput::make('address_line1')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address_line2')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->maxLength(255),

                    ]),

                Section::make('Location Details')
                    ->description('Provide the location details for the address.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('city')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('state')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('postal_code')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('country')
                            ->required()
                            ->maxLength(255),
                    ]),
                Section::make('Address Flags')
                    ->description('Set the flags for the address.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Toggle::make('is_default')
                            ->required(),
                        Forms\Components\Toggle::make('is_billing')
                            ->required(),
                        Forms\Components\Toggle::make('is_shipping')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->getStateUsing(fn($record) => $record->user->name ?? 'N/A')
                    ->label('User')
                    ->sortable(),
                Tables\Columns\TextColumn::make('address_line1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_line2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_default')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_billing')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_shipping')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'view' => Pages\ViewAddress::route('/{record}'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
