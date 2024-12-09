<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContactSection extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('contact-section')
        ->schema([
            TextInput::make('map_url')
                ->label('Map Embed URL')
                ->default('https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed'),
            TextInput::make('title')
                ->label('Title')
                ->required(),
            TextInput::make('description')
                ->label('Description')
                ->required(),
            TextInput::make('email')
                ->label('Email text label')
                ->default('Email')
                ->required(),
            TextInput::make('message')
                ->label('Message text label')
                ->default('Message')
                ->required(),
            TextInput::make('button')
                ->label('Button text')
                ->default('Submit')
                ->required(),
        ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
