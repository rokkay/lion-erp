<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ThirdPartyCustomerType;
use App\Enums\ThirdPartyStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class ThirdParty extends Model
{
    /** @use HasFactory<\Database\Factories\ThirdPartyFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<ThirdPartyType, $this>
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(ThirdPartyType::class);
    }

    /**
     * @return BelongsTo<ThirdPartyEmployeeRange, $this>
     */
    public function employeeRange(): BelongsTo
    {
        return $this->belongsTo(ThirdPartyEmployeeRange::class);
    }

    /**
     * @return BelongsTo<ThirdPartyBusinessType, $this>
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(ThirdPartyBusinessType::class);
    }

    protected function casts(): array
    {
        return [
            'status' => ThirdPartyStatus::class,
            'customer_type' => ThirdPartyCustomerType::class,
        ];
    }
}
