<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderDetails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Order Detail')
                    ->description('Manage the order detail.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('order_id')
                            ->label('Order')
                            ->searchable()
                            ->preload(6)
                            ->relationship('order', 'order_number')
                            ->required(),
                        Forms\Components\Select::make('product_id')
                            ->required()
                            ->relationship('product', 'name')
                            ->label('Product ID'),
                        Forms\Components\Select::make('variant_id')
                            ->relationship('variant', 'color')
                            ->label('Variant ID'),
                        Forms\Components\Textarea::make('product_details')
                            ->required()
                            ->label('Product Details'),
                        Forms\Components\TextInput::make('quantity')
                            ->required()
                            ->numeric()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('total')
                            ->required()
                            ->numeric()
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->native(false)
                            ->options([
                                'pending' => '<span class="text-yellow-500">Pending</span>',
                                'processing' => '<span class="text-blue-500">Processing</span>',
                                'completed' => '<span class="text-green-500">Completed</span>',
                                'cancelled' => '<span class="text-red-500">Cancelled</span>',
                                'shipped' => '<span class="text-purple-500">Shipped</span>',
                                'delivered' => '<span class="text-teal-500">Delivered</span>',
                            ])
                            ->required()
                            ->allowHtml()
                            ->default('pending'),
                        Forms\Components\TextInput::make('tracking_number')
                            ->maxLength(255)
                            ->label('Tracking Number'),

                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('quantity')
            ->columns([
                Tables\Columns\TextColumn::make('order.order_number')
                    ->label('Order Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_id')
                    ->getStateUsing(fn($record) => $record->product->name ?? 'N/A')
                    ->label('Product')
                    ->sortable(),
                Tables\Columns\TextColumn::make('variant_id')
                    ->getStateUsing(fn($record) => $record->variant->color ?? 'N/A')
                    ->label('Variant ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantity')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->html()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tracking_number')
                    ->label('Tracking Number'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
