<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Jobs\SendOrderEmails;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = "phosphor-shopping-bag";
    protected static ?string $navigationGroup = "Orders";

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make("Order Details")
                ->description("Manage the order details.")
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make("user_id")
                        ->label("User")
                        ->searchable()
                        ->preload(6)
                        ->relationship("user", "name"),
                    Forms\Components\Select::make("address_id")
                        ->label("Address")
                        ->relationship("shippingAddress", "address_line1")
                        ->searchable()
                        ->preload(6),
                    Forms\Components\TextInput::make("order_number")
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make("total_amount")
                        ->required()
                        ->numeric()
                        ->prefix("₦"),
                    Forms\Components\TextInput::make("shipping_cost")
                        ->numeric()
                        ->prefix("₦")
                        ->default(0),
                    Forms\Components\Select::make("status")
                        ->native(false)
                        ->options([
                            "pending" =>
                            '<span class="text-yellow-500">Pending</span>',
                            "confirmed" =>
                            '<span class="text-green-500">Confirmed</span>',
                            "processing" =>
                            '<span class="text-blue-500">Processing</span>',
                            "shipped" =>
                            '<span class="text-purple-500">Shipped</span>',
                            "delivered" =>
                            '<span class="text-teal-500">Delivered</span>',
                            "cancelled" =>
                            '<span class="text-red-500">Cancelled</span>',
                        ])
                        ->required()
                        ->allowHtml()
                        ->default("pending")
                        ->afterStateUpdated(function ($state, $record, $old) {
                            if ($record && $old && $state !== $old) {
                                SendOrderEmails::dispatch(
                                    $record,
                                    "status_updated",
                                    $old
                                );
                                Notification::make()
                                    ->title("Order Status Updated")
                                    ->body(
                                        "Order {$record->order_number} status changed to {$state}. Customer has been notified."
                                    )
                                    ->success()
                                    ->send();
                            }
                        }),
                    Forms\Components\Select::make("payment_method")
                        ->options([
                            "bank_transfer" => "Bank Transfer",
                            "card" => "Card Payment",
                            "cash_on_delivery" => "Cash on Delivery",
                        ])
                        ->default("bank_transfer"),
                    Forms\Components\TextInput::make(
                        "tracking_number"
                    )->maxLength(255),
                ]),
            Section::make("Payment Details")
                ->description("Payment and receipt information.")
                ->columns(2)
                ->schema([
                    Forms\Components\FileUpload::make("payment_receipt")
                        ->label("Payment Receipt")
                        ->directory("payment-receipts")
                        ->acceptedFileTypes(["application/pdf", "image/*"])
                        ->maxSize(5120)
                        ->downloadable()
                        ->openable()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make("notes")
                        ->label("Order Notes")
                        ->rows(3)
                        ->columnSpanFull(),
                ]),
            Section::make("Shipping Details")
                ->description("Manage the shipping details.")
                ->columns(2)
                ->schema([
                    Forms\Components\DateTimePicker::make("shipped_at")->native(
                        false
                    ),
                    Forms\Components\DateTimePicker::make(
                        "delivered_at"
                    )->native(false),
                ]),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            ComponentsSection::make("Order Information")
                ->schema([
                    TextEntry::make("order_number")->label("Order Number"),
                    TextEntry::make("user.name")->label("Customer"),
                    TextEntry::make("total_amount")
                        ->label("Subtotal")
                        ->money("NGN"),
                    TextEntry::make("shipping_cost")
                        ->label("Shipping Cost")
                        ->money("NGN"),
                    TextEntry::make("getTotalAmountWithShipping")
                        ->label("Total Amount")
                        ->money("NGN")
                        ->state(
                            fn($record) => $record->getTotalAmountWithShipping()
                        ),
                    TextEntry::make("status")->badge()->color(
                        fn(string $state): string => match ($state) {
                            "pending" => "warning",
                            "confirmed" => "success",
                            "processing" => "info",
                            "shipped" => "primary",
                            "delivered" => "success",
                            "cancelled" => "danger",
                        }
                    ),
                    TextEntry::make("payment_method")
                        ->label("Payment Method")
                        ->formatStateUsing(
                            fn($state) => ucfirst(str_replace("_", " ", $state))
                        ),
                    TextEntry::make("tracking_number")->label(
                        "Tracking Number"
                    ),
                    TextEntry::make("created_at")
                        ->label("Order Date")
                        ->dateTime(),
                ])
                ->columns(2),

            ComponentsSection::make("Payment Information")
                ->schema([
                    TextEntry::make("payment_receipt")
                        ->label("Payment Receipt")
                        ->url(
                            fn($record) => $record->payment_receipt
                                ? asset("storage/" . $record->payment_receipt)
                                : null
                        )
                        ->openUrlInNewTab()
                        ->placeholder("No receipt uploaded"),
                    TextEntry::make("notes")
                        ->label("Order Notes")
                        ->placeholder("No notes"),
                ])
                ->columns(2),
            ComponentsSection::make("Shipping Information")
                ->schema([
                    TextEntry::make("shippingAddress.address_line1")->label(
                        "Street Address"
                    ),
                    TextEntry::make("shippingAddress.city")->label("City"),
                    TextEntry::make("shippingAddress.state")->label("State"),
                    TextEntry::make("shippingAddress.postal_code")->label(
                        "Postal Code"
                    ),
                    TextEntry::make("shippingAddress.phone_number")->label(
                        "Phone Number"
                    ),
                    TextEntry::make("shipped_at")
                        ->label("Shipped Date")
                        ->dateTime()
                        ->placeholder("Not shipped yet"),
                    TextEntry::make("delivered_at")
                        ->label("Delivered Date")
                        ->dateTime()
                        ->placeholder("Not delivered yet"),
                ])
                ->columns(3),

            ComponentsSection::make("Order Items")->schema([
                RepeatableEntry::make("orderDetails")
                    ->label("")
                    ->schema([
                        TextEntry::make("product_name")->label("Product"),
                        TextEntry::make("product_size")
                            ->label("Size")
                            ->placeholder("N/A"),
                        TextEntry::make("product_color")
                            ->label("Color")
                            ->placeholder("N/A"),
                        TextEntry::make("quantity")->label("Quantity"),
                        TextEntry::make("product_price")
                            ->label("Unit Price")
                            ->money("NGN"),
                        TextEntry::make("total")
                            ->label("Total")
                            ->money("NGN")
                            ->state(
                                fn($record) => $record->product_price *
                                    $record->quantity
                            ),
                    ])
                    ->columns(6),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("order_number")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make("user.name")
                    ->label("Customer")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make("user.email")
                    ->label("Email")
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make("user.is_guest")
                    ->label("Guest")
                    ->boolean()
                    ->trueIcon("heroicon-o-user-circle")
                    ->falseIcon("heroicon-o-user")
                    ->toggleable(),
                Tables\Columns\TextColumn::make("total_amount")
                    ->label("Subtotal")
                    ->money("NGN")
                    ->sortable(),
                Tables\Columns\TextColumn::make("shipping_cost")
                    ->label("Shipping")
                    ->money("NGN")
                    ->sortable(),
                Tables\Columns\TextColumn::make("getTotalAmountWithShipping")
                    ->label("Total")
                    ->money("NGN")
                    ->state(
                        fn($record) => $record->getTotalAmountWithShipping()
                    )
                    ->sortable(),
                Tables\Columns\TextColumn::make("status")
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            "pending" => "warning",
                            "confirmed" => "success",
                            "processing" => "info",
                            "shipped" => "primary",
                            "delivered" => "success",
                            "cancelled" => "danger",
                        }
                    )
                    ->searchable(),
                Tables\Columns\IconColumn::make("payment_receipt")
                    ->label("Receipt")
                    ->boolean()
                    ->trueIcon("heroicon-o-document-check")
                    ->falseIcon("heroicon-o-document-minus")
                    ->state(fn($record) => !empty($record->payment_receipt)),
                Tables\Columns\TextColumn::make("shippingAddress.state")
                    ->label("Ship To")
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make("tracking_number")
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make("created_at")
                    ->label("Order Date")
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make("updated_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make("status")->options([
                    "pending" => "Pending",
                    "confirmed" => "Confirmed",
                    "processing" => "Processing",
                    "shipped" => "Shipped",
                    "delivered" => "Delivered",
                    "cancelled" => "Cancelled",
                ]),
                Tables\Filters\Filter::make("has_receipt")
                    ->label("Has Payment Receipt")
                    ->query(
                        fn(Builder $query) => $query->whereNotNull(
                            "payment_receipt"
                        )
                    ),
                Tables\Filters\Filter::make("guest_orders")
                    ->label("Guest Orders")
                    ->query(
                        fn(Builder $query) => $query->whereHas(
                            "user",
                            fn($q) => $q->where("is_guest", true)
                        )
                    ),
                Tables\Filters\Filter::make("created_at")
                    ->form([
                        Forms\Components\DatePicker::make("created_from"),
                        Forms\Components\DatePicker::make("created_until"),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data["created_from"],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    "created_at",
                                    ">=",
                                    $date
                                )
                            )
                            ->when(
                                $data["created_until"],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    "created_at",
                                    "<=",
                                    $date
                                )
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make("confirm")
                    ->label("Confirm")
                    ->icon("heroicon-o-check-circle")
                    ->color("success")
                    ->visible(fn($record) => $record->status === "pending")
                    ->action(function ($record) {
                        $oldStatus = $record->status;
                        $record->update(["status" => "confirmed"]);
                        SendOrderEmails::dispatch(
                            $record,
                            "status_updated",
                            $oldStatus
                        );
                        Notification::make()
                            ->title("Order Confirmed")
                            ->body(
                                "Order {$record->order_number} has been confirmed. Customer has been notified."
                            )
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation(),
                Tables\Actions\Action::make("mark_processing")
                    ->label("Mark as Processing")
                    ->icon("heroicon-o-cog")
                    ->color("info")
                    ->visible(
                        fn($record) => in_array($record->status, [
                            "confirmed",
                            "pending",
                        ])
                    )
                    ->action(function ($record) {
                        $oldStatus = $record->status;
                        $record->update(["status" => "processing"]);
                        SendOrderEmails::dispatch(
                            $record,
                            "status_updated",
                            $oldStatus
                        );
                        Notification::make()
                            ->title("Order Updated")
                            ->body(
                                "Order {$record->order_number} has been marked as processing. Customer has been notified."
                            )
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make("mark_shipped")
                    ->label("Mark as Shipped")
                    ->icon("heroicon-o-truck")
                    ->color("primary")
                    ->visible(
                        fn($record) => in_array($record->status, [
                            "processing",
                        ])
                    )
                    ->form([
                        Forms\Components\TextInput::make("tracking_number")
                            ->label("Tracking Number")
                            ->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $oldStatus = $record->status;
                        $record->update([
                            "status" => "shipped",
                            "tracking_number" => $data["tracking_number"],
                            "shipped_at" => now(),
                        ]);
                        SendOrderEmails::dispatch(
                            $record,
                            "status_updated",
                            $oldStatus
                        );
                        Notification::make()
                            ->title("Order Shipped")
                            ->body(
                                "Order {$record->order_number} has been marked as shipped. Customer has been notified."
                            )
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make("mark_delivered")
                    ->label("Mark as Delivered")
                    ->icon("heroicon-o-check-badge")
                    ->color("success")
                    ->visible(fn($record) => $record->status === "shipped")
                    ->action(function ($record) {
                        $oldStatus = $record->status;
                        $record->update([
                            "status" => "delivered",
                            "delivered_at" => now(),
                        ]);
                        SendOrderEmails::dispatch(
                            $record,
                            "status_updated",
                            $oldStatus
                        );
                        Notification::make()
                            ->title("Order Delivered")
                            ->body(
                                "Order {$record->order_number} has been marked as delivered. Customer has been notified."
                            )
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make("bulk_confirm")
                        ->label("Confirm Selected Orders")
                        ->icon("heroicon-o-check-circle")
                        ->color("success")
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                if ($record->status === "pending") {
                                    $oldStatus = $record->status;
                                    $record->update(["status" => "confirmed"]);
                                    SendOrderEmails::dispatch(
                                        $record,
                                        "status_updated",
                                        $oldStatus
                                    );
                                }
                            }
                            Notification::make()
                                ->title("Orders Confirmed")
                                ->body(
                                    "Selected orders have been confirmed. Customers have been notified."
                                )
                                ->success()
                                ->send();
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make("bulk_processing")
                        ->label("Mark as Processing")
                        ->icon("heroicon-o-cog")
                        ->color("info")
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                if (
                                    in_array($record->status, [
                                        "confirmed",
                                        "pending",
                                    ])
                                ) {
                                    $oldStatus = $record->status;
                                    $record->update(["status" => "processing"]);
                                    SendOrderEmails::dispatch(
                                        $record,
                                        "status_updated",
                                        $oldStatus
                                    );
                                }
                            }
                            Notification::make()
                                ->title("Orders Updated")
                                ->body(
                                    "Selected orders have been marked as processing. Customers have been notified."
                                )
                                ->success()
                                ->send();
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->defaultSort("created_at", "desc");
    }

    public static function getRelations(): array
    {
        return [RelationManagers\OrderDetailsRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListOrders::route("/"),
            "create" => Pages\CreateOrder::route("/create"),
            "edit" => Pages\EditOrder::route("/{record}/edit"),
        ];
    }
}
