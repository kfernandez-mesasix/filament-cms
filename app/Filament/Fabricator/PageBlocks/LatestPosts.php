<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class LatestPosts extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('latest-posts')
            ->schema([

            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
