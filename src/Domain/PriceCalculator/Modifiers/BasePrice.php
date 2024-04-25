<?php

declare(strict_types=1);

namespace App\Domain\PriceCalculator\Modifiers;

use App\Domain\Models\TrajetInterface;
use App\Domain\PriceCalculator\Price;

class BasePrice implements ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void
    {
        $price->value = 500;
    }

    public static function getDefaultPriority(): int
    {
        return 999;
    }
}
