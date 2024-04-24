<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[Entity]
final readonly class Escale
{
    public function __construct(
        #[Id]
        #[Column(type: UuidType::NAME, unique: true)]
        public Uuid             $id,
        #[Column(type: UuidType::NAME)]
        public Uuid             $trajet,
        #[Column]
        public string             $gare,
        #[Column]
        public string             $voie,
        #[Column(type: 'datetime')]
        public \DateTimeInterface $horaire,
    ){}
}
