<?php

declare(strict_types=1);

use App\Enums\ThirdPartyStatus;
use App\Models\ThirdParty;
use App\Models\ThirdPartyEmployeeRange;
use App\Models\ThirdPartyType;

covers(ThirdParty::class);
test('to array', function () {
    $thirdParty = ThirdParty::factory()->create()->fresh();

    expect(array_keys($thirdParty->toArray()))->toBe([
        'id',
        'name',
        'alias',
        'customer_type',
        'is_supplier',
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
        'type_id',
        'business_type_id',
        'employee_range_id',
        'logo',
        'created_at',
        'updated_at',
    ]);
});

test('active', function () {
    $thirdParty = ThirdParty::factory()->active()->create()->fresh();

    expect($thirdParty->status)->toBe(ThirdPartyStatus::Active);
});

test('closed', function () {
    $thirdParty = ThirdParty::factory()->closed()->create()->fresh();

    expect($thirdParty->status)->toBe(ThirdPartyStatus::Closed);
});

test('archived', function () {
    $thirdParty = ThirdParty::factory()->archived()->create()->fresh();

    expect($thirdParty->status)->toBe(ThirdPartyStatus::Archived);
});

test('type field can be null', function () {
    $thirdParty = ThirdParty::factory()->create([
        'type_id' => null,
    ])->fresh();

    expect($thirdParty->type_id)->toBeNull();
});

it('belongs to type', function () {
    $thirdParty = ThirdParty::factory()->create([
        'type_id' => ThirdPartyType::factory(),
    ])->fresh();

    expect($thirdParty->type)->toBeInstanceOf(ThirdPartyType::class);
});

it('belongs to employee range', function () {
    $thirdParty = ThirdParty::factory()->create([
        'employee_range_id' => ThirdPartyEmployeeRange::factory(),
    ])->fresh();

    expect($thirdParty->employeeRange)->toBeInstanceOf(ThirdPartyEmployeeRange::class);
});
