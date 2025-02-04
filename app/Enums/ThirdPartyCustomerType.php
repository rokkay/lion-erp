<?php

declare(strict_types=1);

namespace App\Enums;

enum ThirdPartyCustomerType: string
{
    case Potential = 'Potential';
    case Mixed = 'Mixed';
    case Customer = 'Customer';
    case None = 'None';
}
