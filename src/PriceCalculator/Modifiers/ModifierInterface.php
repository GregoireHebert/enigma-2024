<?php

declare(strict_types=1);

namespace App\PriceCalculator\Modifiers;

use App\Models\TrajetInterface;
use App\PriceCalculator\Price;

interface ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void;

    public function getPriority(): int;
}
