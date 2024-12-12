<?php

namespace App\Filament\Widgets;

use Z3d0X\FilamentFabricator\Models\Page;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class PagesWidget extends BaseWidget
{
    use InteractsWithPageFilters, HasWidgetShield;

    protected int | string | array $columnSpan = 1;

    protected ?string $heading = 'Pages Widget';

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        return [
            Stat::make(
                label: 'Total pages',
                value: Page::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )
            ->url('/admin/pages'),
        ];

    }

    protected function getColumns(): int
    {
        return 1;
    }
}
