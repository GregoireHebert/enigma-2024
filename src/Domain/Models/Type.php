<?php

declare(strict_types=1);

namespace App\Domain\Models;

enum Type: string
{
    case TGV = 'tgv';
    case INOUI = 'inoui';
    case TER = 'ter';
}
