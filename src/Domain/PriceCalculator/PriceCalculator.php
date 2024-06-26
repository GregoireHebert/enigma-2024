<?php

declare(strict_types=1);

namespace App\Domain\PriceCalculator;

use App\Domain\Models\TrajetInterface;
use App\Domain\PriceCalculator\Modifiers\ModifierInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class PriceCalculator
{
    public function __construct
    (
        /** @var iterable<ModifierInterface>  */
        #[AutowireIterator(tag: 'app.price_calculator.modifier')]
        private iterable $modifiers,
    ){}

    public function calculatePrice(TrajetInterface $trajet): Price
    {
        $price = new Price();


        foreach ($this->modifiers as $modifier){
            // TODO verifier le type ModifierInterface
            $modifier->apply($trajet, $price);
        }

        return $price;
    }
}
