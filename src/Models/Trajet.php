<?php

declare(strict_types=1);

namespace App\Models;

use Symfony\Component\Uid\UuidV4;

final class Trajet
{
    public readonly UuidV4 $id;

    /**
     * @var iterable<Escale>
     */
    private iterable $escales;

    public Type $type;

    public function __construct(Type $type, Escale ...$escale)
    {
        $this->id = UuidV4::v4();
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
}
