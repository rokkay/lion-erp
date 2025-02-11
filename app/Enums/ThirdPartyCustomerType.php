<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ThirdPartyCustomerType: string implements HasLabel
{
    case Potential = 'potential';
    case Mixed = 'mixed';
    case Customer = 'customer';
    case None = 'none';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Potential => __('Potential'),
            self::Mixed => __('Mixed'),
            self::Customer => __('Customer'),
            self::None => __('None'),
        };
    }
}
