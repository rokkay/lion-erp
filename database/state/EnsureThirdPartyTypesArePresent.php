<?php

declare(strict_types=1);

namespace Database\State;

use Illuminate\Support\Facades\DB;

final class EnsureThirdPartyTypesArePresent
{
    public function __invoke(): void
    {
        if ($this->present()) {
            return;
        }

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
            DB::table('third_party_types')->insert([
                'label' => $value,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function present(): bool
    {
        return DB::table('third_party_types')->count() > 0;
    }
}
