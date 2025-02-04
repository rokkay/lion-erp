<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Models\ThirdPartyEmployeeRange;

test('to array', function () {
    $thirdPartyEmployeeRange = ThirdPartyEmployeeRange::factory()->create()->fresh();

    expect(array_keys($thirdPartyEmployeeRange->toArray()))->toBe([
        'id',
        'label',
        'is_active',
        'created_at',
        'updated_at',
    ]);
});
