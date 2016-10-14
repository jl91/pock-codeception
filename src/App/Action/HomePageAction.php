<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Domain\Entity\BooksEntity;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

class HomePageAction
{
    private $router;

    private $template;

    private $em;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null, EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->router = $router;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $data = [];

        $repository = $this->em->getRepository(BooksEntity::class);

        $data['books'] =  $repository->findAll();

        return new HtmlResponse($this->template->render('app::home-page', $data));
    }
}
