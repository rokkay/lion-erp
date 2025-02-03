<?php

use App\Models\ThirdParty;

test('to array', function () {
    $thirdParty = ThirdParty::factory()->create()->fresh();

    expect(array_keys($thirdParty->toArray()))->toBe([
        'id',
        'name',
        'alias',
        'customer_prospect',
        'status',
        'address',
        'zipcode',
        'country',
        'state',
        'city',
        'phone',
        'mobile',
        'email',
        'fax',
        'website',
        'tax_id',
        'industry_classification',
        'is_vat_subject',
        'type',
        'business_type',
        'employee_range',
        'logo',
        'created_at',
        'updated_at',
    ]);
});
