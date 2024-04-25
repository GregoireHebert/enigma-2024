<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Trajets;

use App\Application\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/trajets', name: 'trajets_liste', methods: ['GET'])]
#[AsController]
class Liste
{
    public function __construct(
        private readonly TrajetRepositoryInterface $trajetRepository,
    ) {}

    public function __invoke()
    {
        return $this->trajetRepository->findAll();
    }
}
