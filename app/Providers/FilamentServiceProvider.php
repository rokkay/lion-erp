<?php

declare(strict_types=1);

namespace App\Providers;

use Filament\Tables\Columns\Column;
use Illuminate\Support\ServiceProvider;

final class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Column::configureUsing(function (Column $column): void {
            $column
                ->sortable()
                ->toggleable()
                ->searchable(isIndividual: true);
        });
    }
}
