<?php

declare(strict_types=1);

namespace App\Domain\PriceCalculator\Modifiers;

use App\Domain\Models\TrajetInterface;
use App\Domain\Models\Type;
use App\Domain\PriceCalculator\Price;

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
