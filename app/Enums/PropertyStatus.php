<?php

namespace App\Enums;

enum PropertyStatus: string
{
    case AVAILABLE = 'available';
    case UNDER_REVIEW = 'under_review';
    case APPROVED = 'approved';
    case SOLD = 'sold';
    case ON_HOLD = 'on_hold';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
