<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ThirdPartyType;
use Illuminate\Database\Seeder;

final class ThirdPartyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            'Administración',
            'Otro',
            'Gran empresa',
            'Mayorista',
            'Particular',
            'PYME',
            'Minorista',
            'Startup',
            'TPE',
        ];

        foreach ($values as $value) {
            ThirdPartyType::factory()->create([
                'label' => $value,
            ]);
        }
    }
}
