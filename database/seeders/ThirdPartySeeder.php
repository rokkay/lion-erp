<?php

namespace Database\Seeders;

use App\Models\ThirdParty;
use Illuminate\Database\Seeder;

class ThirdPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThirdParty::factory(50)->create();
    }
}
