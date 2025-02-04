<?php

declare(strict_types=1);

use App\Models\ThirdPartyBusinessType;
use App\Models\ThirdPartyEmployeeRange;
use App\Models\ThirdPartyType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('third_parties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('customer_type');
            $table->boolean('is_supplier')->default(false);
            $table->string('status');
            $table->text('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('tax_id')->unique()->nullable();
            $table->string('industry_classification')->nullable();
            $table->boolean('is_vat_subject')->default(true);
            $table->foreignIdFor(ThirdPartyType::class, 'type_id')->nullable()->constrained();
            $table->foreignIdFor(ThirdPartyBusinessType::class, 'business_type_id')->nullable()->constrained();
            $table->foreignIdFor(ThirdPartyEmployeeRange::class, 'employee_range_id')->nullable()->constrained();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }
};
