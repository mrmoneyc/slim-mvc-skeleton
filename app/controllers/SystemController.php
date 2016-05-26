<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SystemController
{
    protected $logger;
    protected $cfgModel;
    
    public function __construct($logger, $cfgModel)
    {
        $this->logger = $logger;
        $this->cfgs = $cfgModel;
    }
    
    public function getConfig(Request $request, Response $response, $args)
    {
        $data = [];
        $this->logger->info("Action: Get Configuration from DB");
        
        try {
            if (isset($args['id'])) {
                $data = $this->cfgs->getConfigById($args['id']);
            } else {
                $data = $this->cfgs->getAllConfig();
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->logger->error($e->getMessage());
            die;
        }
        
        return $response->withJson($data);
    }
    
    public function getVersion(Request $request, Response $response, $args)
    {
        $this->logger->info("Action: Get Application Version");
        
        $appVersion = [
            'version' => APP_VERSION,
            'build' => APP_BUILD,
            'fullVersion' => 'V' . APP_VERSION . '(' . APP_BUILD . ')'
        ];
        
        return $response->withJson($appVersion);
    }
}
