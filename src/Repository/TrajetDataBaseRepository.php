<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Escale;
use App\Models\Escale as ModelEscale;
use App\Models\Trajet;
use App\Models\Type;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TrajetDataBaseRepository extends ServiceEntityRepository implements TrajetRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Escale::class);
    }

    public function findAll(): array
    {
        /** @var Escale[] $escales */
        $escales = $this->createQueryBuilder('e')
            ->select('e')
            ->orderBy('e.horaire', 'ASC')
            ->getQuery()
            ->getResult();

        $trajets = [];

        foreach ($escales as $escale) {
            if (null === ($trajets[$escale->trajet->toRfc4122()] ?? null)) {
                $trajets[$escale->trajet->toRfc4122()] = new Trajet(Type::TGV);
            }

            $trajets[$escale->trajet->toRfc4122()]->addEscale(
                new ModelEscale(
                    gare: $escale->gare,
                    voie: $escale->voie,
                    horaire: $escale->horaire,
                ),
            );
        }

        return $trajets;
    }
}
