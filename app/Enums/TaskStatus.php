<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Active = 'active';
    case Completed = 'completed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function checkActive($value): bool
    {
        return ($value == self::Active->value);
    }

    public static function checkCompleted($value): bool
    {
        return ($value == self::Completed->value);
    }
}
