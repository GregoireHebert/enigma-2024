<?php

declare(strict_types=1);

namespace App\PriceCalculator;

use App\Models\Trajet;
use App\Models\TrajetInterface;
use App\PriceCalculator\Modifiers\ModifierInterface;

class PriceCalculator
{
    public function __construct
    (
        /** @var iterable<ModifierInterface>  */
        private iterable $modifiers,
    ){}

    public function calculatePrice(TrajetInterface $trajet): Price
    {
        $price = new Price();

        foreach ($this->modifiers as $modifier){
            $modifier->apply($trajet, $price);
        }

        return $price;
    }
}
