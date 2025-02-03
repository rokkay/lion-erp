<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ThirdParty;
use Illuminate\Database\Seeder;

final class ThirdPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThirdParty::factory(50)->create();
    }
}
