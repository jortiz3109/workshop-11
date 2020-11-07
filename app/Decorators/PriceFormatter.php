<?php

namespace App\Decorators;

final class PriceFormatter implements PriceFormatterContract
{
    public function format(float $price): string
    {
        return (string) $price;
    }
}
