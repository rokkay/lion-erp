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
        Schema::create('third_party_types', function (Blueprint $table): void {
            $table->id();
            $table->string('label');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

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
};
