<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Escale;
use App\Models\Trajet;
use App\Models\Type;

final class TrajetInMemoryRepository
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

        $lilleCalais = new Trajet(Type::TER, $lille, $grandeSynthe, $calais);

        return [
            $lilleCalais
        ];
    }
}
