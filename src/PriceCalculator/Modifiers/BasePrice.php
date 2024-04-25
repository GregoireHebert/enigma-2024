<?php

declare(strict_types=1);

namespace App\PriceCalculator\Modifiers;

use App\Models\TrajetInterface;
use App\PriceCalculator\Price;

class BasePrice implements ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void
    {
        $price->value = 500;
    }

    public function getPriority(): int
    {
        return 999;
    }
}
