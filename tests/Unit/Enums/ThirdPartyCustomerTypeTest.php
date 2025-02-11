<?php

declare(strict_types=1);

use App\Enums\ThirdPartyCustomerType;

test('all cases have a label', function () {
    collect(ThirdPartyCustomerType::cases())->each(function (ThirdPartyCustomerType $case) {
        expect($case->getLabel())->toBeString();
    });
});
