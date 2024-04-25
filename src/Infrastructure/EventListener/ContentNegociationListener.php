<?php

namespace App\Infrastructure\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

final class ContentNegociationListener
{
    private const array SUPPORTED_FORMATS = ['html', 'json'];
    private const array ALLOW_SPECIAL_ROUTES = ['debug_bar' => '#^/_wdt#'];

    #[AsEventListener(event: KernelEvents::REQUEST)]
    public function onKernelRequest(RequestEvent $event): void
    {
        foreach (self::ALLOW_SPECIAL_ROUTES as $specialRoute) {
            if (preg_match($specialRoute, $event->getRequest()->getPathInfo())){
                return;
            }
        }

        $requestedFormat = $event->getRequest()->getPreferredFormat('');

        if (!in_array($requestedFormat, self::SUPPORTED_FORMATS, true)){
            throw new NotAcceptableHttpException(
                sprintf('Unsupported Accept format "%s", expected "%s"',
                    $event->getRequest()->headers->get('Accept', ''),
                    implode('","', self::SUPPORTED_FORMATS)
                )
            );
        }
    }
}
