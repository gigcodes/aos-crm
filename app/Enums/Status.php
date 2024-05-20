<?php

namespace App\Enums;

use App\Contracts\EnumHelpers;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasLabel
{
    use EnumHelpers;

    case TO_DO       = 'to_do';
    case IN_PROGRESS = 'in_progress';
    case QA          = 'qa';
    case DONE        = 'done';

    /**
     * Gets the label associated with the enum
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::TO_DO       => 'To-do',
            self::IN_PROGRESS => 'In-progress',
            self::QA          => 'QA',
            self::DONE        => 'Done'
        };
    }
}
