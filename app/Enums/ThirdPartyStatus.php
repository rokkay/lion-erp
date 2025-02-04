<?php

declare(strict_types=1);

namespace App\Enums;

enum ThirdPartyStatus: string
{
    case Active = 'Active';
    case Closed = 'Closed';
    case Archived = 'Archived';
}
