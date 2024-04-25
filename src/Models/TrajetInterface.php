<?php

declare(strict_types=1);

namespace App\Models;

interface TrajetInterface
{
    public function getDepart(): Escale;
    public function getArrivee(): Escale;
    public function getArrets(): iterable;
    public function addEscale(Escale $escale): void;
    public function getType(): Type;
}
