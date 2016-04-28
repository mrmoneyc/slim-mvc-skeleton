<?php
namespace App\Model;

use Slim\Container;

class BaseModel
{
    protected $db;
    protected $logger;

    public function __construct(Container $container)
    {
        $this->db = $container->get('pdo');
        $this->logger = $container->get('logger');
    }
}
