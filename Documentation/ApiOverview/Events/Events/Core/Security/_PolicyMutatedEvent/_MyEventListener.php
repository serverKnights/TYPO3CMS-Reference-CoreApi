<?php

declare(strict_types=1);

namespace MyVendor\MyExtension\ContentSecurityPolicy\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Directive;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Event\PolicyMutatedEvent;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Scope;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\UriValue;

#[AsEventListener(
    identifier: 'my-extension/mutate-policy'
)]
final class MyEventListener
{
    public function __invoke(PolicyMutatedEvent $event): void
    {
        if ($event->scope !== Scope::backend()) {
            // Only the backend policy should be adjusted
            return;
        }

        // Allow images from example.org
        $event->getCurrentPolicy()->extend(
            Directive::ImgSrc,
            new UriValue('https://example.org/')
        );
    }
}
