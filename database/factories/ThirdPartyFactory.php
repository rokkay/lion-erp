<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ThirdPartyCustomerType;
use App\Enums\ThirdPartyStatus;
use App\Models\ThirdPartyBusinessType;
use App\Models\ThirdPartyEmployeeRange;
use App\Models\ThirdPartyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThirdParty>
 */
final class ThirdPartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
            'type_id' => ThirdPartyType::all()->random(),
            'business_type_id' => ThirdPartyBusinessType::all()->random(),
            'employee_range_id' => ThirdPartyEmployeeRange::all()->random(),
            'logo' => fake()->imageUrl(),
        ];
    }

    public function active(): static
    {
        return $this->state([
            'status' => ThirdPartyStatus::Active,
        ]);
    }

    public function closed(): static
    {
        return $this->state([
            'status' => ThirdPartyStatus::Closed,
        ]);
    }

    public function archived(): static
    {
        return $this->state([
            'status' => ThirdPartyStatus::Archived,
        ]);
    }
}
