<?php

declare(strict_types=1);

use App\Enums\ThirdPartyStatus;

test('all cases have a label', function () {
    collect(ThirdPartyStatus::cases())->each(function (ThirdPartyStatus $case) {
        expect($case->getLabel())->toBeString();
    });
});

test('all cases have a color', function () {
    collect(ThirdPartyStatus::cases())->each(function (ThirdPartyStatus $case) {
        expect($case->getColor())->toBeString();
    });
});
