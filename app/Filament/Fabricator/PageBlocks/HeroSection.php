<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeroSection extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero-section')
        ->schema([
            Grid::make(2) // Two-column grid to replicate the hero layout
                ->schema([
                    // Left Content
                    Grid::make(1)
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->required()
                                ->placeholder('Enter the title')
                                ->helperText('The main title displayed in the hero section.'),

                            Textarea::make('description')
                                ->label('Description')
                                ->required()
                                ->rows(4)
                                ->placeholder('Enter the description')
                                ->helperText('The supporting text for the hero section.'),

                            Repeater::make('buttons')
                                ->label('Buttons')
                                ->schema([
                                    TextInput::make('text')
                                        ->label('Button Text')
                                        ->required()
                                        ->placeholder('Enter button text'),

                                    TextInput::make('link')
                                        ->label('Button Link')
                                        ->required()
                                        ->placeholder('Enter the button link'),

                                    TextInput::make('style')
                                        ->label('Button Style')
                                        ->default('primary')
                                        ->placeholder('e.g., primary, secondary')
                                        ->helperText('Define styles like "primary" or "secondary".'),
                                ])
                        ->required(),
                        ])
                        ->columnSpan(1),

                    // Right Content (Image)
                    FileUpload::make('image')
                        ->label('Hero Image')
                        ->image()
                        ->required()
                        ->helperText('Upload the image displayed in the hero section.')
                        ->directory('hero-images')
                        ->columnSpan(1),
                ]),
        ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
