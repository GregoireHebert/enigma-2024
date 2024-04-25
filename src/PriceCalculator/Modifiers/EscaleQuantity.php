<?php

declare(strict_types=1);

namespace App\PriceCalculator\Modifiers;

use App\Models\TrajetInterface;
use App\PriceCalculator\Price;

class EscaleQuantity implements ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void
    {
        $percent = $price->value * .1;
        $cout = count($trajet->getArrets()) * $percent;
        $price->value = (int) ($price->value + $cout);
    }

    public function getPriority(): int
    {
        return 7;
    }
}
