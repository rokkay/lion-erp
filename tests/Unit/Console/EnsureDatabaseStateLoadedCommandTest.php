<?php

declare(strict_types=1);

use App\Models\ThirdPartyBusinessType;
use App\Models\ThirdPartyEmployeeRange;
use App\Models\ThirdPartyType;

test('database state is loaded', function () {
    $this->artisan('app:ensure-database-state-is-loaded')
        ->assertExitCode(0);

    expect(ThirdPartyType::count())->toBeGreaterThan(0);
    expect(ThirdPartyBusinessType::count())->toBeGreaterThan(0);
    expect(ThirdPartyEmployeeRange::count())->toBeGreaterThan(0);
});
