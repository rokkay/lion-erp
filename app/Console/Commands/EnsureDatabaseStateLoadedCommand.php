<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Database\State\EnsureThirdPartyBussinessTypesArePresent;
use Database\State\EnsureThirdPartyEmployeeRangesArePresent;
use Database\State\EnsureThirdPartyTypesArePresent;
use Illuminate\Console\Command;

use function collect;

final class EnsureDatabaseStateLoadedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ensure-database-state-is-loaded';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        collect([
            new EnsureThirdPartyTypesArePresent,
            new EnsureThirdPartyEmployeeRangesArePresent,
            new EnsureThirdPartyBussinessTypesArePresent,
        ])->each->__invoke();
    }
}
