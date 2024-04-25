<?php

declare(strict_types=1);

namespace App\PriceCalculator\Modifiers;

use App\Models\TrajetInterface;
use App\PriceCalculator\Price;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.price_calculator.modifier')]
interface ModifierInterface
{
    public function apply(TrajetInterface $trajet, Price $price): void;

    public static function getDefaultPriority(): int;
}
