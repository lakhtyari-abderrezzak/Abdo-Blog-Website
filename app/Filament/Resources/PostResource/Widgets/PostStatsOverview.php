<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number Of Post', Post::count()),
            Stat::make('Featured Of Post', Post::where('featured', 1)->count()),
        ];
    }
}
