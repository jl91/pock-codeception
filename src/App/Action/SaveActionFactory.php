<?php

namespace App\Action;

use Domain\Service\BooksService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SaveActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);

        $service = $container->get(BooksService::class);

        $template = ($container->has(TemplateRendererInterface::class))
            ? $container->get(TemplateRendererInterface::class)
            : null;


        return new SaveAction($router, $service, $template);
    }
}
