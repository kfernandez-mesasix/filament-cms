<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CTA extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('cta-section')
            ->schema([
                TextInput::make('title'),
                TextInput::make('button_text')
                    ->label('Button Text')
                    ->required()
                    ->placeholder('Enter button text'),

                TextInput::make('button_link')
                    ->label('Button Link')
                    ->required()
                    ->placeholder('Enter the button link')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
