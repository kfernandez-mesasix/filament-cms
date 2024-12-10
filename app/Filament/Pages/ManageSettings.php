<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ManageSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $title = 'Settings';

    protected static ?int $navigationSort = 4;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                ->tabs([
                    Tab::make('General')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site name')
                            ->required(),
                        TextInput::make('site_description')
                            ->label('Site description')
                            ->required(),
                        TextInput::make('site_admin_email')
                            ->label('Site Administrator Email')
                            ->email()
                            ->required(),
                        FileUpload::make('site_favicon')
                            ->label('Site Favicon')
                            ->image()
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/x-icon']),
                    ]),
                    Forms\Components\Tabs\Tab::make('Header')
                        ->schema([
                            Forms\Components\FileUpload::make('header_logo')
                                ->label('Logo')
                                ->image(),
                            Forms\Components\Repeater::make('header_menu')
                                ->label('Menu')
                                ->schema([
                                    Forms\Components\TextInput::make('label')
                                        ->label('Label')
                                        ->required(),
                                    Forms\Components\TextInput::make('url')
                                        ->label('URL')
                                        ->required(),
                                ])
                                ->columns(2),
                            Fieldset::make('Header Button')
                                ->schema([
                                    Forms\Components\TextInput::make('header_button_label')
                                        ->label('Label')
                                        ->required(),
                                    Forms\Components\TextInput::make('header_button_url')
                                        ->label('URL')
                                        ->required()
                                ]),
                        ]),
                    Forms\Components\Tabs\Tab::make('Footer')
                        ->schema([
                            Forms\Components\FileUpload::make('footer_logo')
                                ->label('Logo')
                                ->image(),
                            Forms\Components\Repeater::make('footer_menu')
                                ->label('Menu')
                                ->schema([
                                    Forms\Components\TextInput::make('label')
                                        ->label('Label')
                                        ->required(),
                                    Forms\Components\TextInput::make('url')
                                        ->label('URL')
                                        ->required(),
                                ])
                                ->columns(2),
                            Forms\Components\Textarea::make('footer_copyright')
                                ->label('Copyright Text'),
                        ]),
                    Forms\Components\Tabs\Tab::make('Scripts')
                        ->schema([
                            Forms\Components\Textarea::make('header_script')
                                ->label('Custom Header Script')
                                ->rows(3),
                            Forms\Components\Textarea::make('footer_script')
                                ->label('Custom Footer Script')
                                ->rows(3),
                            Forms\Components\Textarea::make('after_head_script')
                                ->label('Custom Script After <head>')
                                ->rows(3),
                        ]),
                     Forms\Components\Tabs\Tab::make('Social Media')
                        ->schema([
                            Forms\Components\TextInput::make('facebook_link')
                                ->label('Facebook')
                                ->url()
                                ->placeholder('https://facebook.com/yourpage'),
                            Forms\Components\TextInput::make('x_link')
                                ->label('X (Twitter)')
                                ->url()
                                ->placeholder('https://x.com/yourprofile'),
                            Forms\Components\TextInput::make('instagram_link')
                                ->label('Instagram')
                                ->url()
                                ->placeholder('https://instagram.com/yourprofile'),
                            Forms\Components\TextInput::make('linkedin_link')
                                ->label('LinkedIn')
                                ->url()
                                ->placeholder('https://linkedin.com/in/yourprofile'),
                            Forms\Components\TextInput::make('tiktok_link')
                                ->label('TikTok')
                                ->url()
                                ->placeholder('https://tiktok.com/@yourprofile'),
                        ]),
                ])
            ]);
    }
}
