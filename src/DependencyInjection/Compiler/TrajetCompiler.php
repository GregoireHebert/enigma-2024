<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Repository\TrajetDataBaseRepository;
use App\Repository\TrajetInMemoryRepository;
use App\Repository\TrajetRepositoryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class TrajetCompiler implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $container->setAlias(TrajetRepositoryInterface::class, TrajetDataBaseRepository::class);

        if ($container->getParameter('monTrucAMoi') === 'dev') {
            $container->setAlias(TrajetRepositoryInterface::class, TrajetInMemoryRepository::class);
        }
    }
}
