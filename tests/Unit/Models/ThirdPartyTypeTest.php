<?php

declare(strict_types=1);

use App\Models\ThirdPartyType;

test('to array', function () {
    $thirdPartyType = ThirdPartyType::factory()->create()->fresh();

    expect(array_keys($thirdPartyType->toArray()))->toBe([
        'id',
        'label',
        'is_active',
        'created_at',
        'updated_at',
    ]);
});
