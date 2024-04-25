<?php

declare(strict_types=1);

namespace App\PriceCalculator\Modifiers;

use App\Models\TrajetInterface;
use App\Models\Type;
use App\PriceCalculator\Price;

class TGVFactor implements ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void
    {
        if ($trajet->getType() === Type::TGV) {
            $price->value += 20000;
        }
    }

    public static function getDefaultPriority(): int
    {
        return 7;
    }
}
