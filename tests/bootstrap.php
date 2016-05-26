<?php 
// Settings to make all errors more obvious during testing
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('Asia/Taipei');

require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\RequestBody;
use Slim\Http\Stream;
use Slim\Http\UploadedFile;
use Slim\Http\Uri;
use Slim\Http\Body;

class Slim3TestCase extends PHPUnit_Framework_TestCase
{
    protected $app;
    
    public function setUp()
    {
        // Load constant file
        require __DIR__ . '/../app/consts.php';
        
        // Instantiate the app
        $settings = require __DIR__ . '/../app/settings.php';
        $app = new \Slim\App($settings);
        
        // Set up dependencies
        require __DIR__ . '/../app/dependencies.php';
        
        // Register middleware
        require __DIR__ . '/../app/middleware.php';
        
        // Register routes
        require __DIR__ . '/../app/routes.php';
        $this->app = $app;
    }
    
    public function requestFactory($requestUrl)
    {
        $uri = Uri::createFromString($requestUrl);
        $headers = new Headers();
        $cookies = [];
        $env = Slim\Http\Environment::mock();
        $serverParams = $env->all();
        $body = new Body(fopen('php://temp', 'r+'));
        $request = new Request('GET', $uri, $headers, $cookies, $serverParams, $body);
        
        return $request;
    }
}