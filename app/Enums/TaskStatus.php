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
}
