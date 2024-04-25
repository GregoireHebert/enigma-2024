<?php

declare(strict_types=1);

namespace App\Infrastructure\ContentNegociation;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HtmlFormater extends AbstractFormater
{
    public function __construct(private readonly Environment $twig)
    {
    }

    public const string SUPPORTED_FORMAT = 'html';

    public function format(iterable|object $data): Response
    {

        $reflection = is_array($data) ? new \ReflectionClass($data[array_key_first($data)]) : new \ReflectionClass($data);
        $resourceName = is_array($data) ? $reflection->getShortName().'s' : $reflection->getShortName();

        $renderedData = $this->twig->render($resourceName.'.html.twig', [$resourceName => $data]);

        return new Response($renderedData);
    }
}
