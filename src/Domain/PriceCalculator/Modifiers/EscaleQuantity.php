<?php

declare(strict_types=1);

namespace App\Domain\PriceCalculator\Modifiers;

use App\Domain\Models\TrajetInterface;
use App\Domain\PriceCalculator\Price;

class EscaleQuantity implements ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void
    {
        $percent = $price->value * .1;
        $cout = count($trajet->getArrets()) * $percent;
        $price->value = (int) ($price->value + $cout);
    }

    public static function getDefaultPriority(): int
    {
        return 9;
    }
}
