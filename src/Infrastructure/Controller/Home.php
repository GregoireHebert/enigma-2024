<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Home
{
    #[Route(path: '/', name: 'home')]
    public function home(): Response
    {
        return new Response(
            <<<HTML
<html>
    <head></head>
    <body>
        <h1>Coucou</h1>
    </body>
</html>
HTML
        );
    }
}
