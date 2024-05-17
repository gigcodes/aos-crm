<?php

namespace App\Enums;

use App\Contracts\EnumHelpers;
use Filament\Support\Contracts\HasLabel;

enum Roles: string implements HasLabel
{
    use EnumHelpers;

    case SUPER_ADMIN      = 'super_admin';
    case CUSTOMER         = 'customer';

    /**
     * Gets the label associated with the enum
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::SUPER_ADMIN      => 'Super Admin',
            self::CUSTOMER         => 'Customer',
        };
    }
}
