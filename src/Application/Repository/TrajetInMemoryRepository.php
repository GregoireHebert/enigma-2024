<?php

declare(strict_types=1);

namespace App\Application\Repository;

use App\Domain\Models\Escale;
use App\Domain\Models\Trajet;
use App\Domain\Models\TrajetInterface;
use App\Domain\Models\Type;
use Symfony\Component\Uid\Uuid;

final class TrajetInMemoryRepository implements TrajetRepositoryInterface
{
    public function findAll(): iterable
    {
        $lille = new Escale(
            gare: 'Lille',
            voie: '13',
            horaire: \DateTimeImmutable::createFromFormat('H:i', '09:12')
        );

        $grandeSynthe = new Escale(
            gare: 'Grande Synthe',
            voie: 'A',
            horaire: \DateTimeImmutable::createFromFormat('H:i', '09:39')
        );

        $calais = new Escale(
            gare: 'Calais',
            voie: 'B',
            horaire: \DateTimeImmutable::createFromFormat('H:i', '10:09')
        );

        $lilleCalais = new Trajet(Uuid::v4(), Type::TER, $lille, $grandeSynthe, $calais);

        return [
            $lilleCalais
        ];
    }

    public function findOneById(Uuid $id): TrajetInterface
    {
        $lille = new Escale(
            gare: 'Lille',
            voie: '13',
            horaire: \DateTimeImmutable::createFromFormat('H:i', '09:12')
        );

        $grandeSynthe = new Escale(
            gare: 'Grande Synthe',
            voie: 'A',
            horaire: \DateTimeImmutable::createFromFormat('H:i', '09:39')
        );

        $calais = new Escale(
            gare: 'Calais',
            voie: 'B',
            horaire: \DateTimeImmutable::createFromFormat('H:i', '10:09')
        );

        return new Trajet($id, Type::TER, $lille, $grandeSynthe, $calais);
    }
}
