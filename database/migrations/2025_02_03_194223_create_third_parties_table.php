<?php

declare(strict_types=1);

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
            $table->string('customer_prospect');
            $table->tinyInteger('status')->default(1);
            $table->text('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('industry_classification')->nullable();
            $table->boolean('is_vat_subject')->default(true);
            $table->string('type')->nullable();
            $table->string('business_type')->nullable();
            $table->tinyInteger('employee_range')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }
};
