<?php

declare(strict_types=1);

namespace Database\State;

use Illuminate\Support\Facades\DB;

final class EnsureThirdPartyBussinessTypesArePresent
{
    public function __invoke(): void
    {
        if ($this->present()) {
            return;
        }

        $values = [
            'Empresario Individual',
            'Comunidad de Bienes',
            'Sociedad Civil',
            'Sociedad Colectiva',
            'Sociedad Limitada',
            'Sociedad Anónima',
            'Sociedad Comanditaria por Acciones',
            'Sociedad Comanditaria Simple',
            'Sociedad Laboral',
            'Sociedad Cooperativa',
            'Sociedad de Garantía Recíproca',
            'Entidad de Capital-Riesgo',
            'Agrupación de Interés Económico',
            'Sociedad de Inversión Mobiliaria',
            'Agrupación sin Ánimo de Lucro',
        ];

        foreach ($values as $value) {
            DB::table('third_party_business_types')->insert([
                'label' => $value,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }

    private function present(): bool
    {
        return DB::table('third_party_business_types')->count() > 0;
    }
}
