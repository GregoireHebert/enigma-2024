<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Trajets;

use App\Application\Repository\TrajetRepositoryInterface;
use App\Domain\Models\NullTrajet;
use App\Domain\PriceCalculator\Price;
use App\Domain\PriceCalculator\PriceCalculator;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\UuidV4;

#[Route('/trajets/{id}/tarif', name: 'trajet_tarif')]
#[AsController]
class Tarif
{
    public function __invoke(PriceCalculator $priceCalculator, TrajetRepositoryInterface $trajetRepository, string $id): Price
    {
        $trajet = $trajetRepository->findOneById(UuidV4::fromRfc4122($id));

        if ($trajet instanceof NullTrajet) {
            throw new NotFoundHttpException();
        }

        return $priceCalculator->calculatePrice($trajet);
    }
}
