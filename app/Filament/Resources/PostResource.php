<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PostResource\Pages;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(Post::class, 'slug', ignoreRecord: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),
                RichEditor::make('content')
                    ->label('Content')
                    ->columnSpan('full')
                    ->required(),
                Textarea::make('excerpt')
                    ->label('Excerpt')
                    ->columnSpan('full')
                    ->required()
                    ->maxLength(500),
                DateTimePicker::make('published_at')
                    ->label('Published At')
                    ->nullable(),
                SpatieMediaLibraryFileUpload::make('image')
                    ::make('image')
                    ->label('Feature Image')
                    ->image()
                    ->collection('images')
                    ->directory('posts')
                    ->disk('public')
                    ->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug')
                    ->formatStateUsing(fn ($state) => url('posts/' . $state))
                    ->url(fn ($record) => url('posts/' . $record->slug), true)
                    ->openUrlInNewTab(),
                TextColumn::make('excerpt')->limit(50),
                TextColumn::make('published_at')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()?->can('manage posts') ?? false;
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->can('manage posts') ?? false;
    }

    public static function canEdit($record): bool
    {
        return Auth::user()?->can('manage posts') ?? false;
    }

    public static function canDelete($record): bool
    {
        return Auth::user()?->can('manage posts') ?? false;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->can('manage posts') ?? false;
    }
}
