<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
class UsersWidget extends BaseWidget
{
    use InteractsWithPageFilters, HasWidgetShield;

    protected int | string | array $columnSpan = 1;

    protected ?string $heading = 'Users Widget';

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        return [
            Stat::make(
                label: 'Total users',
                value: User::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            )
            ->url('/admin/users'),
        ];
    }

    protected function getColumns(): int
    {
        return 1;
    }
}
