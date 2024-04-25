<?php

declare(strict_types=1);

namespace App\Infrastructure\ContentNegociation;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class JsonFormater extends AbstractFormater
{
     public function __construct(private readonly SerializerInterface $serializer)
     {
     }

    public const string SUPPORTED_FORMAT = 'json';

    public function format($data): JsonResponse
    {
        return new JsonResponse($this->serializer->serialize($data, 'json'), 200, [], true);
    }
}

