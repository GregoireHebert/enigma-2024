<?php

declare(strict_types=1);

namespace App\Infrastructure\DependencyInjection\Compiler;

use App\Application\Repository\TrajetDataBaseRepository;
use App\Application\Repository\TrajetInMemoryRepository;
use App\Application\Repository\TrajetRepositoryInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

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
