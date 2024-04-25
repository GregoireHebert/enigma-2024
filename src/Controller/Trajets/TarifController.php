<?php

declare(strict_types=1);

namespace App\Controller\Trajets;

use App\Models\NullTrajet;
use App\PriceCalculator\Modifiers\BasePrice;
use App\PriceCalculator\Modifiers\EscaleQuantity;
use App\PriceCalculator\Modifiers\TypeTrain;
use App\PriceCalculator\PriceCalculator;
use App\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\UuidV4;


#[Route('/trajets/{id}/tarif', name: 'trajet_tarif')]
#[AsController]
class TarifController
{
    public function __invoke(PriceCalculator $priceCalculator, TrajetRepositoryInterface $trajetRepository, string $id): JsonResponse
    {
        $trajet = $trajetRepository->findOneById(UuidV4::fromRfc4122($id));

        if ($trajet instanceof NullTrajet) {
            throw new NotFoundHttpException();
        }

        return new JsonResponse(['tarif' => $priceCalculator->calculatePrice($trajet)]);
    }
}
