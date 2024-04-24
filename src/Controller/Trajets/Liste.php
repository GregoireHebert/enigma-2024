<?php

declare(strict_types=1);

namespace App\Controller\Trajets;

use App\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/trajets', name: 'trajets_liste', methods: ['GET'])]
#[AsController]
class Liste
{
    public function __construct(
        private readonly SerializerInterface      $serializer,
        private readonly TrajetRepositoryInterface $trajetRepository,
    ) {}

    public function __invoke(): JsonResponse
    {
        $mesTrajets = $this->trajetRepository->findAll();
        $serialized = $this->serializer->serialize($mesTrajets, 'json');

        return new JsonResponse($serialized, 200, [], true);
    }
}
