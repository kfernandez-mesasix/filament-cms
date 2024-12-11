<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\TextInput;
use App\Http\View\Composers\SettingsComposer;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', SettingsComposer::class);
        FilamentFabricator::registerSchemaSlot('sidebar.after', [
            Section::make('Meta')
            ->schema([
                TextInput::make('seo_title')
                    ->label('SEO Title')
                    ->maxLength(60),
                TextInput::make('seo_author_name')
                    ->label('Author Name'),
                Textarea::make('seo_description')
                    ->label('Description')
                    ->maxLength(160),
                Select::make('seo_meta_tag_robots')
                    ->label('Meta Tag Robots')
                    ->options([
                        'index, follow' => 'Index, Follow',
                        'index, nofollow' => 'Index, Nofollow',
                        'noindex, follow' => 'Noindex, Follow',
                        'noindex, nofollow' => 'Noindex, Nofollow',
                    ])
                    ->default('index, follow'),
            ])


        ]);
        Model::unguard();
    }
}
