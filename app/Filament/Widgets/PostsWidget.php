<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class PostsWidget extends BaseWidget
{
    use InteractsWithPageFilters, HasWidgetShield;

    protected int | string | array $columnSpan = 1;

    protected ?string $heading = 'Posts Widget';

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        return [
            Stat::make(
                label: 'Total posts',
                value: Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )
            ->url('/admin/posts'),
        ];

    }

    protected function getColumns(): int
    {
        return 1;
    }
}
