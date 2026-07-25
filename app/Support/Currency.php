<?php

namespace App\Support;

class Currency
{
    public const CODE = 'UGX';

    public static function format(float|int|string|null $amount): string
    {
        return self::CODE.' '.number_format((float) $amount, 0);
    }
}
