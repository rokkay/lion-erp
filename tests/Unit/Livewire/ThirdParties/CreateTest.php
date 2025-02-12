<?php

declare(strict_types=1);

use App\Enums\ThirdPartyCustomerType;
use App\Enums\ThirdPartyStatus;
use App\Livewire\ThirdParties\Create;
use App\Models\ThirdPartyBusinessType;
use App\Models\ThirdPartyEmployeeRange;
use App\Models\ThirdPartyType;
use Livewire\Volt\Volt;

it('can render page', function () {
    Volt::test(Create::class)->assertSuccessful();
});

test('can create a third party', function () {

    Volt::test(Create::class)->fillForm([
        'alias' => fake()->word(),
        'name' => fake()->company(),
        'customer_type' => fake()->randomElement(ThirdPartyCustomerType::cases()),
        'status' => fake()->randomElement(ThirdPartyStatus::cases()),
        'is_supplier' => fake()->boolean(),
        'address' => fake()->streetAddress(),
        'zipcode' => fake()->postcode(),
        'country' => fake()->country(),
        'state' => fake()->city(),
        'city' => fake()->city(),
        'phone' => fake()->phoneNumber(),
        'mobile' => fake()->mobileNumber(),
        'email' => fake()->unique()->companyEmail(),
        'fax' => fake()->phoneNumber(),
        'website' => fake()->url(),
        'tax_id' => fake()->unique()->vat(),
        'industry_classification' => fake()->word(),
        'is_vat_subject' => fake()->boolean(),
        // 'type_id' => ThirdPartyType::factory(),
        // 'business_type_id' => ThirdPartyBusinessType::factory(),
        // 'employee_range_id' => ThirdPartyEmployeeRange::factory(),
        'logo' => fake()->imageUrl(),
    ])
        ->call('create')
        ->assertHasNoFormErrors();
});
