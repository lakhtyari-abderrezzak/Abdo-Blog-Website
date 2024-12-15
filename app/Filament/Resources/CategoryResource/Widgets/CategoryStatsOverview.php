<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            stat::make('Number Of Categories', Category::count()),
        ];
    }
}
