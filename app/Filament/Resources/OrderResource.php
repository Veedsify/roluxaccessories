<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'phosphor-shopping-bag';
    protected static ?string $navigationGroup = 'Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Order Details')
                    ->description('Manage the order details.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->searchable()
                            ->preload(6)
                            ->relationship('user', 'name'),
                        Forms\Components\Select::make('address_id')
                            ->label('Address')
                            ->relationship('shippingAddress', 'address_line1')
                            ->searchable()
                            ->preload(6),
                        Forms\Components\TextInput::make('order_number')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('total_amount')
                            ->required()
                            ->numeric(),
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
                            ->maxLength(255),
                    ]),
                Section::make('Shipping Details')
                    ->description('Manage the shipping details.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\DatePicker::make('shipped_at')
                            ->native(false),
                        Forms\Components\DatePicker::make('delivered_at')
                            ->native(false),
                    ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ComponentsSection::make('Order Information')
                    ->schema([
                        TextEntry::make('order_number')
                            ->label('Order Number'),
                        TextEntry::make('user.name')
                            ->label('Customer'),
                        TextEntry::make('total_amount')
                            ->label('Total Amount')
                            ->money('USD'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'pending' => 'warning',
                                'processing' => 'info',
                                'completed' => 'success',
                                'cancelled' => 'danger',
                                'shipped' => 'primary',
                                'delivered' => 'success',
                            }),
                        TextEntry::make('tracking_number')
                            ->label('Tracking Number'),
                    ])
                    ->columns(2),

                ComponentsSection::make('Shipping Information')
                    ->schema([
                        TextEntry::make('shippingAddress.address_line1')
                            ->label('Shipping Address'),
                        TextEntry::make('shipped_at')
                            ->label('Shipped Date')
                            ->dateTime(),
                        TextEntry::make('delivered_at')
                            ->label('Delivered Date')
                            ->dateTime(),
                    ])
                    ->columns(2),

                ComponentsSection::make('Order Details')
                    ->schema([
                        RepeatableEntry::make('orderDetails')
                            ->label('')
                            ->schema([
                                TextEntry::make('product.name')
                                    ->label('Product'),
                                // ->url(fn($record) => route('filament.admin.resources.products.view', $record->product)),
                                TextEntry::make('quantity')
                                    ->label('Quantity'),
                                TextEntry::make('price')
                                    ->label('Unit Price')
                                    ->money('USD'),
                            ])
                            ->columns(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        'shipped' => 'primary',
                        'delivered' => 'success',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('tracking_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipped_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivered_at')
                    ->dateTime()
                    ->sortable(),
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
            RelationManagers\OrderDetailsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
