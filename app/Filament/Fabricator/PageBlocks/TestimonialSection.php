<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class TestimonialSection extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('testimonial-section')
            ->schema([
                Repeater::make('testimonials')
                ->label('Testimonials')
                ->schema([
                    TextInput::make('author_name')
                        ->label('Author Name')
                        ->required(),
                    TextInput::make('author_role')
                        ->label('Author Role')
                        ->required(),
                    FileUpload::make('author_image')
                        ->label('Author Image')
                        ->image()
                        ->required(),
                    Textarea::make('testimonial')
                        ->label('Testimonial Text')
                        ->rows(3)
                        ->required(),
                ])
                ->columns(2)
                ->collapsible()
                ->collapsed(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
