<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Models\Comment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CommentStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            stat::make('Number Of Comments', Comment::count())
        ];
    }
}
