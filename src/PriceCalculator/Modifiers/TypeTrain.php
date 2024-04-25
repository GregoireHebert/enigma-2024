<?php

declare(strict_types=1);

namespace App\PriceCalculator\Modifiers;

use App\Models\TrajetInterface;
use App\Models\Type;
use App\PriceCalculator\Price;

class TypeTrain implements ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void
    {
        $price->value += match ($trajet->getType()) {
            Type::INOUI => 500,
            Type::TER => 1500,
            Type::TGV => 2500,
        };
    }

    public static function getDefaultPriority(): int
    {
        return 7;
    }
}
