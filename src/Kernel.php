<?php

namespace App;

use App\Infrastructure\DependencyInjection\Compiler\TrajetCompiler;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

//        $container->registerForAutoconfiguration(ModifierInterface::class)
//            ->addTag('app.price_calculator.modifier');

        $container->addCompilerPass(new TrajetCompiler());
//        $container->addCompilerPass(new PriceCalculatorCompiler());
    }
}
