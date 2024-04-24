<?php

declare(strict_types=1);

namespace App\Models;

enum Type: string
{
    case TGV = 'tgv';
    case INOUI = 'inoui';
    case TER = 'ter';
}
