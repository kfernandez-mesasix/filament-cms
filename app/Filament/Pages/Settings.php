<?php
namespace App\Filament\Pages;

use App\Models\Page;
use App\Models\Setting;
use Filament\Pages\Page as FilamentPage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class Settings extends FilamentPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $view = 'filament.pages.settings';

    public $homepage_slug;
    public $site_title;
    public $site_description;

    // Define the schema for settings form
    protected function getFormSchema(): array
    {
        return [
            Select::make('homepage_slug')
                ->label('Select Homepage')
                ->options(function () {
                    return Page::pluck('title', 'slug')->toArray();
                })
                ->required()
                ->reactive()
                ->searchable()
                ->default($this->getHomepageSlug()),

            TextInput::make('site_title')
                ->label('Site Title')
                ->required()
                ->default($this->getSiteTitle()),

            TextInput::make('site_description')
                ->label('Site Description')
                ->required()
                ->default($this->getSiteDescription()),
        ];
    }

    // Get the homepage slug from settings or default
    protected function getHomepageSlug()
    {
        return Setting::get('homepage_slug') ?? 'home';
    }

    // Get the site title from settings or default
    protected function getSiteTitle()
    {
        return Setting::get('site_title') ?? 'My Site';
    }

    // Get the site description from settings or default
    protected function getSiteDescription()
    {
        return Setting::get('site_description') ?? 'A great website';
    }

    // Save settings data to the database
    protected function mutateFormDataBeforeSave(array $data): array
    {
        Setting::set('homepage_slug', $data['homepage_slug']);
        Setting::set('site_title', $data['site_title']);
        Setting::set('site_description', $data['site_description']);

        return $data;
    }
}
