<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class IndexController extends BaseController
{
    public function index(Request $request, Response $response, $args)
    {
        $this->logger->info("Index action dispatched");

        $this->view->render($response, 'index.twig');
        return $response;
    }
}
