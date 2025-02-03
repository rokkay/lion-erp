<?php

declare(strict_types=1);

namespace Database\Factories;

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
            'alias' => fake()->text(),
            'name' => fake()->company(),
            'customer_prospect' => fake()->text(),
            'status' => fake()->boolean(),
            'address' => fake()->streetAddress(),
            'zipcode' => fake()->postcode(),
            'country' => fake()->country(),
            'state' => fake()->city(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'mobile' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'fax' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'tax_id' => fake()->text(),
            'industry_classification' => fake()->word(),
            'is_vat_subject' => fake()->boolean(),
            'type' => fake()->word(),
            'business_type' => fake()->word(),
            'employee_range' => fake()->numberBetween(1, 5),
            'logo' => fake()->imageUrl(),
        ];
    }
}
