<?php

namespace App\Support;

class Currency
{
    public const CODE = 'USD';

    public static function format(float|int|string|null $amount): string
    {
        return '$'.number_format((float) $amount, 0);
    }
}
