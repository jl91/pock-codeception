<?php

namespace App\Action;

use Domain\Service\BooksService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

class SaveAction
{
    private $router;

    private $template;

    private $service;

    public function __construct(Router\RouterInterface $router, BooksService $service, Template\TemplateRendererInterface $template = null)
    {
        $this->router = $router;
        $this->service = $service;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {

        $body = (object)$request->getParsedBody();

        $this->service->save($body);


        $message = $this->service->getMessages();
        $data['message'] = $message;

        return new HtmlResponse($this->template->render('app::save-page', $data));
    }
}
