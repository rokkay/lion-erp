<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Models\ThirdPartyBusinessType;

test('to array', function () {
    $thirdPartyBusinessType = ThirdPartyBusinessType::factory()->create()->fresh();

    expect(array_keys($thirdPartyBusinessType->toArray()))->toBe([
        'id',
        'label',
        'is_active',
        'created_at',
        'updated_at',
    ]);
});
