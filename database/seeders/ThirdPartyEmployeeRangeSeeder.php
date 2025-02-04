<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ThirdPartyEmployeeRange;
use Illuminate\Database\Seeder;

final class ThirdPartyEmployeeRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            '1 - 5',
            '6 - 10',
            '11 - 50',
            '51 - 100',
            '101 - 500',
            '> 500',
        ];

        foreach ($values as $value) {
            ThirdPartyEmployeeRange::factory()->create([
                'label' => $value,
                'is_active' => true,
            ]);
        }
    }
}
