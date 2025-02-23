<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Tableau de bord';
    public function mount()
    {
        abort_unless(auth()->user()->is_admin, 403);
    }
}
