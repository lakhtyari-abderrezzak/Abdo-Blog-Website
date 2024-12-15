<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number Of Users', User::count()),
            Stat::make('Number Of Admins', User::where('role', User::ADMIN_ROLE)->count()),
            Stat::make('Number Of Editors', User::where('role', operator: User::EDITOR_ROLE)->count()),
        ];
    }
}
