<?php

declare(strict_types=1);

namespace App\Domain\Models;

final class NullTrajet implements TrajetInterface
{
    public function getDepart(): Escale
    {
        throw new \BadMethodCallException('Not Implemented');
    }

    public function getArrivee(): Escale
    {
        throw new \BadMethodCallException('Not Implemented');
    }

    public function getArrets(): iterable
    {
        throw new \BadMethodCallException('Not Implemented');
    }

    public function addEscale(Escale $escale): void
    {
        throw new \BadMethodCallException('Not Implemented');
    }

    public function getType(): Type
    {
        throw new \BadMethodCallException('Not Implemented');
    }
}
