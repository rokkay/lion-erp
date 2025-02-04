<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ThirdPartyBusinessType;
use Illuminate\Database\Seeder;

final class ThirdPartyBusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            ThirdPartyBusinessType::factory()->create([
                'label' => $value,
                'is_active' => true,
            ]);
        }
    }
}
