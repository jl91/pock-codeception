<?php

namespace Domain\Factory;

use Doctrine\ORM\EntityManager;
use Domain\Service\BooksService;
use Interop\Container\ContainerInterface;

class BookServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get(EntityManager::class);

        return new BooksService($em);
    }
}
