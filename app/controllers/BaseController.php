<?php
namespace App\Controller;

class BaseController
{
    protected $view;
    protected $logger;

    public function __construct($view, $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }
}
