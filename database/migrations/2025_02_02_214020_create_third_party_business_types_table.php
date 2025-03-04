<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('third_party_business_types', function (Blueprint $table): void {
            $table->id();
            $table->string('label');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

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
};
