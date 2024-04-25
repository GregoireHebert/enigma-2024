<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\PriceCalculator\PriceCalculator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class PriceCalculatorCompiler implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
//        $calculatorDefinition = $container->findDefinition(PriceCalculator::class);
//
//        $references = [];
//        foreach ($container->findTaggedServiceIds('app.price_calculator.modifier') as $id => $attributes) {
//            $references[] = new Reference($id);
//        }
//
//        $calculatorDefinition->setArgument('$modifiers', $references);
    }
}
