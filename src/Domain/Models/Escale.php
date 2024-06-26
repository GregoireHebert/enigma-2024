<?php

declare(strict_types=1);

namespace App\Domain\Models;

final readonly class Escale
{
    public function __construct(
        public string             $gare,
        public string             $voie,
        public \DateTimeInterface $horaire,
    ){}
}
