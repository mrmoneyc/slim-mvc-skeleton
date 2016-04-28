<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\ConfigurationModel as Configuration;

final class SystemController extends BaseController
{
    public function getConfig(Request $request, Response $response, $args)
    {
        $data = array();
        $this->logger->info("Action: Get Configuration from DB");
        
        try {
            $cfgs = new Configuration($this->c);
            
            if (isset($args['id'])) {
                $data = $cfgs->getConfigById($args['id']);
            } else {
                $data = $cfgs->getAllConfig();
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
        
        $appVersion = array(
            'version' => APP_VERSION,
            'build' => APP_BUILD,
            'fullVersion' => 'V' . APP_VERSION . '(' . APP_BUILD . ')'
        );
        
        return $response->withJson($appVersion);
    }
}
