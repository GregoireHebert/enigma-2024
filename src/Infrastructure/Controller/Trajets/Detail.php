<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Trajets;

use App\Application\Repository\TrajetRepositoryInterface;
use App\Domain\Models\NullTrajet;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

#[Route('/trajets/{id}', name: 'trajet_detail', methods: ['GET'])]
#[AsController]
class Detail
{
    public function __construct(
        private readonly TrajetRepositoryInterface $trajetRepository,
    ) {}

    public function __invoke(string $id)
    {
        $trajet = $this->trajetRepository->findOneById(Uuid::fromRfc4122($id));

        if ($trajet instanceof NullTrajet) {
            throw new NotFoundHttpException();
        }

        return $trajet;
    }
}
