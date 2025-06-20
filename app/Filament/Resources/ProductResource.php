<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'phosphor-t-shirt';
    protected static ?string $navigationGroup = 'Products';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('collection_id')
                                    ->label('Collection')
                                    ->relationship('collection', 'name')
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('brand_id')
                                    ->label('Brand')
                                    ->relationship('brand', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                            ]),

                        Forms\Components\TextInput::make('name')
                            ->label('Product Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Select::make('gender')
                                    ->label('Gender')
                                    ->required()
                                    ->options([
                                        'Male' => 'Male',
                                        'Female' => 'Female',
                                        'Unisex' => 'Unisex',
                                    ]),
                                Forms\Components\TextInput::make('quantity')
                                    ->label('Quantity')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0),
                                Forms\Components\TextInput::make('rate')
                                    ->label('Rating')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->maxValue(5)
                                    ->step(0.1),
                            ]),
                    ]),

                Forms\Components\Section::make('Product Attributes')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('productSizes')
                                    ->label('Product Sizes')
                                    ->relationship('productSizes', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('productColors')
                                    ->label('Product Colors')
                                    ->relationship('productColors', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('productFeatures')
                                    ->label('Product Features')
                                    ->relationship('productFeatures', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('productType')
                                    ->label('Product Types')
                                    ->relationship('productType', 'name')
                                    ->searchable()
                                    ->preload(),
                            ]),
                    ]),

                Forms\Components\Section::make('Pricing')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->label('Selling Price')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->prefix('₦')
                                    ->minValue(0),
                                Forms\Components\TextInput::make('originPrice')
                                    ->label('Original Price')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->prefix('₦')
                                    ->minValue(0),
                                Forms\Components\TextInput::make('sold')
                                    ->label('Units Sold')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->readOnly(),
                            ]),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('active')
                                    ->label('Active')
                                    ->default(true)
                                    ->inline(false),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Product')
                                    ->default(false)
                                    ->inline(false),
                                Forms\Components\Toggle::make('new')
                                    ->label('New Product')
                                    ->default(false)
                                    ->inline(false),
                                Forms\Components\Toggle::make('sale')
                                    ->label('On Sale')
                                    ->default(false)
                                    ->inline(false),
                            ]),
                    ]),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Product Description')
                            ->columnSpanFull(),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('action')
                                    ->label('Action Button Text')
                                    ->required()
                                    ->maxLength(255)
                                    ->default('Buy Now'),
                            ]),
                    ]),
                Forms\Components\Section::make('Images')
                    ->collapsible()
                    ->schema([
                        Repeater::make('images')
                            ->label('Product Images')
                            ->relationship()
                            ->grid(4)
                            ->minItems(2)
                            ->schema([
                                Forms\Components\FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required()
                                    ->maxSize(1024)
                                    ->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->defaultItems(1)
                    ])
            ]);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Product Information')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('category.name')
                                    ->label('Category'),
                                \Filament\Infolists\Components\TextEntry::make('collection.name')
                                    ->label('Collection'),
                                \Filament\Infolists\Components\TextEntry::make('brand.name')
                                    ->label('Brand'),
                                \Filament\Infolists\Components\TextEntry::make('gender')
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'Male' => 'blue',
                                        'Female' => 'pink',
                                        'Unisex' => 'gray',
                                    }),
                            ]),
                        \Filament\Infolists\Components\TextEntry::make('name')
                            ->label('Product Name')
                            ->weight(\Filament\Support\Enums\FontWeight::Bold)
                            ->columnSpanFull(),
                    ]),

                \Filament\Infolists\Components\Section::make('Product Attributes')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('productSizes.name')
                                    ->label('Available Sizes')
                                    ->badge()
                                    ->separator(','),
                                \Filament\Infolists\Components\TextEntry::make('productColors.name')
                                    ->label('Available Colors')
                                    ->badge()
                                    ->separator(','),
                                \Filament\Infolists\Components\TextEntry::make('productFeatures.name')
                                    ->label('Features')
                                    ->badge()
                                    ->separator(','),
                                \Filament\Infolists\Components\TextEntry::make('productType.name')
                                    ->label('Product Types')
                                    ->badge()
                                    ->separator(','),
                            ]),
                    ]),

                \Filament\Infolists\Components\Section::make('Pricing & Inventory')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(3)
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('price')
                                    ->label('Selling Price')
                                    ->money('NGN')
                                    ->weight(\Filament\Support\Enums\FontWeight::Bold),
                                \Filament\Infolists\Components\TextEntry::make('originPrice')
                                    ->label('Original Price')
                                    ->money('NGN'),
                                \Filament\Infolists\Components\TextEntry::make('quantity')
                                    ->label('Stock Quantity')
                                    ->badge()
                                    ->color(fn(int $state): string => $state > 10 ? 'success' : ($state > 0 ? 'warning' : 'danger')),
                                \Filament\Infolists\Components\TextEntry::make('sold')
                                    ->label('Units Sold')
                                    ->numeric(),
                                \Filament\Infolists\Components\TextEntry::make('rate')
                                    ->label('Rating')
                                    ->suffix(' / 5')
                                    ->badge()
                                    ->color('warning'),
                            ]),
                    ]),

                \Filament\Infolists\Components\Section::make('Product Status')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(4)
                            ->schema([
                                \Filament\Infolists\Components\IconEntry::make('active')
                                    ->label('Active')
                                    ->boolean(),
                                \Filament\Infolists\Components\IconEntry::make('is_featured')
                                    ->label('Featured')
                                    ->boolean(),
                                \Filament\Infolists\Components\IconEntry::make('new')
                                    ->label('New Product')
                                    ->boolean(),
                                \Filament\Infolists\Components\IconEntry::make('sale')
                                    ->label('On Sale')
                                    ->boolean(),
                            ]),
                    ]),

                \Filament\Infolists\Components\Section::make('Product Details')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('description')
                            ->label('Description')
                            ->html()
                            ->prose()
                            ->columnSpanFull(),
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('slug')
                                    ->label('URL Slug')
                                    ->copyable(),
                                \Filament\Infolists\Components\TextEntry::make('action')
                                    ->label('Action Button Text'),
                            ]),
                    ])->collapsed(),

                \Filament\Infolists\Components\Section::make('Timestamps')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('created_at')
                                    ->label('Created At')
                                    ->dateTime(),
                                \Filament\Infolists\Components\TextEntry::make('updated_at')
                                    ->label('Updated At')
                                    ->dateTime(),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->width(50)
                    ->getStateUsing(function ($record) {
                        return $record->images[0]->url;
                    }),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\IconColumn::make('new')
                    ->boolean(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('sale')
                    ->boolean(),
                Tables\Columns\TextColumn::make('price')
                    ->money("NGN")
                    ->sortable(),
                Tables\Columns\TextColumn::make('sold')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('action')
                    ->searchable(),
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
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make("view product")
                        ->label('Preview Product')
                        ->requiresConfirmation()
                        ->url(fn(Product $record): string => route('product.detail', $record->slug || "hello"))
                        ->icon('phosphor-eye')
                        ->openUrlInNewTab(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
