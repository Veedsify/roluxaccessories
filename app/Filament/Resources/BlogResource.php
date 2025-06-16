<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'phosphor-newspaper';
    protected static ?string $navigationGroup = 'Content Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Blog Details')
                    ->description('Manage the blog details.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('thumbImg')
                            ->image()
                            ->maxSize(1024)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('coverImg')
                            ->image()
                            ->maxSize(1024)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Blog Metadata')
                    ->description('Manage the blog metadata.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('blog_category_id')
                            ->searchable()
                            ->preload(true)
                            ->relationship('blogCategory', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('user_id')
                            ->default(Auth::id())
                            ->readOnly()
                            ->required(),
                    ]),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbImg')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('coverImg')
                    ->searchable(),
                Tables\Columns\TextColumn::make('blog_category_id')
                    ->label('Category')
                    ->getStateUsing(function ($record) {
                        return $record->blogCategory ? $record->blogCategory->name : 'N/A';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->getStateUsing(function ($record) {
                        return $record->user ? $record->user->name : 'N/A';
                    })
                    ->label('Author')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'view' => Pages\ViewBlog::route('/{record}'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
