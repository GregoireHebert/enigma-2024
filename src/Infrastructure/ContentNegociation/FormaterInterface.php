<?php

declare(strict_types=1);

namespace App\Infrastructure\ContentNegociation;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\HttpFoundation\Response;

#[AutoconfigureTag(name: 'app.content_negociation.formater')]
interface FormaterInterface
{
    public function support(string $format): bool;
    /**
     * @return Response
     */
    public function format(object $data);
}
