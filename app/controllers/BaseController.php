<?php
namespace App\Controller;

use Slim\Container;

class BaseController
{
    protected $c;
    protected $config;
    protected $view;
    protected $logger;

    public function __construct(Container $container)
    {
        $this->c = $container;
        $this->config = $container->get('settings');
        $this->view = $container->get('view');
        $this->logger = $container->get('logger');
    }
}
