<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigurationResource\Pages;
use App\Models\Configuration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;

class ConfigurationResource extends Resource
{
    protected static ?string $model = Configuration::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $modelLabel = 'Configuration';

    protected static ?string $pluralModelLabel = 'Site Settings';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Configuration Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('key')
                                    ->required()
                                    ->unique(Configuration::class, 'key', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Unique identifier for this configuration'),

                                Forms\Components\TextInput::make('label')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Display name for this configuration'),
                            ]),

                        Grid::make(3)
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->required()
                                    ->options([
                                        'text' => 'Text',
                                        'textarea' => 'Textarea',
                                        'image' => 'Image',
                                        'email' => 'Email',
                                        'phone' => 'Phone',
                                        'url' => 'URL',
                                        'json' => 'JSON',
                                        'boolean' => 'Boolean',
                                        'integer' => 'Integer',
                                        'float' => 'Float',
                                    ])
                                    ->default('text')
                                    ->reactive(),

                                Forms\Components\Select::make('group')
                                    ->required()
                                    ->options([
                                        'general' => 'General',
                                        'contact' => 'Contact',
                                        'social' => 'Social Media',
                                        'seo' => 'SEO',
                                        'appearance' => 'Appearance',
                                        'payment' => 'Payment',
                                        'shipping' => 'Shipping',
                                    ])
                                    ->default('general'),

                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Display order (lower numbers first)'),
                            ]),

                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->helperText('Optional description for this configuration'),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->helperText('Enable/disable this configuration'),
                    ]),

                Section::make('Configuration Value')
                    ->schema([
                        Forms\Components\TextInput::make('value')
                            ->label('Value')
                            ->maxLength(65535)
                            ->visible(fn(Forms\Get $get) => in_array($get('type'), ['text', 'email', 'phone', 'url', 'integer', 'float']))
                            ->required(fn(Forms\Get $get) => in_array($get('type'), ['text', 'email', 'phone', 'url', 'integer', 'float'])),

                        Forms\Components\Textarea::make('value')
                            ->label('Value')
                            ->rows(5)
                            ->visible(fn(Forms\Get $get) => $get('type') === 'textarea')
                            ->required(fn(Forms\Get $get) => $get('type') === 'textarea'),

                        Forms\Components\FileUpload::make('value')
                            ->label('Image')
                            ->image()
                            ->directory('configurations')
                            ->visible(fn(Forms\Get $get) => $get('type') === 'image')
                            ->required(fn(Forms\Get $get) => $get('type') === 'image'),

                        Forms\Components\Toggle::make('value')
                            ->label('Value')
                            ->visible(fn(Forms\Get $get) => $get('type') === 'boolean')
                            ->required(fn(Forms\Get $get) => $get('type') === 'boolean'),

                        Forms\Components\KeyValue::make('value')
                            ->label('JSON Data')
                            ->visible(fn(Forms\Get $get) => $get('type') === 'json')
                            ->required(fn(Forms\Get $get) => $get('type') === 'json')
                            ->default([])
                            ->formatStateUsing(function ($state) {
                                if (is_string($state)) {
                                    $decoded = json_decode($state, true);
                                    return is_array($decoded) ? $decoded : [];
                                }
                                return is_array($state) ? $state : [];
                            }),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->colors([
                        'primary' => 'general',
                        'success' => 'contact',
                        'warning' => 'social',
                        'danger' => 'seo',
                        'secondary' => 'appearance',
                        'info' => 'payment',
                        'gray' => 'shipping',
                    ])
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'text',
                        'success' => 'textarea',
                        'warning' => 'image',
                        'danger' => 'email',
                        'secondary' => 'phone',
                        'info' => 'url',
                        'gray' => 'json',
                        'slate' => 'boolean',
                        'zinc' => 'integer',
                        'neutral' => 'float',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->formatStateUsing(function ($state, $record) {
                        try {
                            if ($record->type === 'image' && $state) {
                                return 'Image uploaded';
                            }
                            if ($record->type === 'boolean') {
                                return $state ? 'Yes' : 'No';
                            }
                            if ($record->type === 'json') {
                                if (is_array($state)) {
                                    return 'JSON data (' . count($state) . ' items)';
                                }
                                return 'JSON data';
                            }
                            return $state ?: '';
                        } catch (\Exception $e) {
                            return 'Error displaying value';
                        }
                    })
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('group')
            ->defaultSort('sort_order')
            ->filters([
                SelectFilter::make('group')
                    ->options([
                        'general' => 'General',
                        'contact' => 'Contact',
                        'social' => 'Social Media',
                        'seo' => 'SEO',
                        'appearance' => 'Appearance',
                        'payment' => 'Payment',
                        'shipping' => 'Shipping',
                    ]),

                SelectFilter::make('type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Textarea',
                        'image' => 'Image',
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'url' => 'URL',
                        'json' => 'JSON',
                        'boolean' => 'Boolean',
                        'integer' => 'Integer',
                        'float' => 'Float',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only')
                    ->native(false),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfigurations::route('/'),
            'create' => Pages\CreateConfiguration::route('/create'),
            'edit' => Pages\EditConfiguration::route('/{record}/edit'),
        ];
    }
}
