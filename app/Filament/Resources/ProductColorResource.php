<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductColorResource\Pages;
use App\Filament\Resources\ProductColorResource\RelationManagers;
use App\Models\ProductColor;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductColorResource extends Resource
{
    protected static ?string $model = ProductColor::class;

    protected static ?string $navigationIcon = 'phosphor-palette';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product Color')
                    ->description('Manage product colors')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Color Name')
                            ->columnSpanFull()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->columnSpanFull()
                            ->required()
                            ->maxLength(255)
                            ->unique(ProductColor::class, 'slug', ignoreRecord: true),
                        Forms\Components\ColorPicker::make('image')
                            ->label('Color')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('image'),
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
            'index' => Pages\ListProductColors::route('/'),
            'create' => Pages\CreateProductColor::route('/create'),
            'view' => Pages\ViewProductColor::route('/{record}'),
            'edit' => Pages\EditProductColor::route('/{record}/edit'),
        ];
    }
}
