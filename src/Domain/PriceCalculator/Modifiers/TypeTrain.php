<?php

declare(strict_types=1);

namespace App\Domain\PriceCalculator\Modifiers;

use App\Domain\Models\TrajetInterface;
use App\Domain\Models\Type;
use App\Domain\PriceCalculator\Price;

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
