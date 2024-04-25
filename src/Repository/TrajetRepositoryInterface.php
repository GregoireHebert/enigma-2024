<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\TrajetInterface;
use Symfony\Component\Uid\UuidV4;

interface TrajetRepositoryInterface
{
    public function findAll(): iterable;

    public function findOneById(UuidV4 $id): TrajetInterface;
}
