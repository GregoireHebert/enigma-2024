<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Symfony\Component\Uid\Uuid;

final class Trajet implements TrajetInterface
{
    public readonly Uuid $id;

    /**
     * @var iterable<Escale>
     */
    private iterable $escales;

    public Type $type;

    public function __construct(Uuid $id, Type $type, Escale ...$escale)
    {
        $this->id = $id;
        $this->type = $type;
        $this->escales = $escale;
    }

    public function getDepart(): Escale
    {
        return $this->escales[0];
    }

    public function getArrivee(): Escale
    {
        return end($this->escales);
    }

    /**
     * @return iterable<Escale>
     */
    public function getArrets(): iterable
    {
        return array_slice($this->escales, 1, -1);
    }

    public function addEscale(Escale $escale): void
    {
        $this->escales[] = $escale;
    }

    public function getType(): Type
    {
        return $this->type;
    }
}
