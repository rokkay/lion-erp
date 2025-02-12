<?php

declare(strict_types=1);

namespace Database\State;

use Illuminate\Support\Facades\DB;

final class EnsureThirdPartyEmployeeRangesArePresent
{
    public function __invoke(): void
    {
        if ($this->present()) {
            return;
        }

        $values = [
            '1 - 5',
            '6 - 10',
            '11 - 50',
            '51 - 100',
            '101 - 500',
            '> 500',
        ];

        foreach ($values as $value) {
            DB::table('third_party_employee_ranges')->insert([
                'label' => $value,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function present(): bool
    {
        return DB::table('third_party_employee_ranges')->count() > 0;
    }
}
