<?php

class SystemApiTest extends Slim3TestCase
{
    public function testGetAllConfig()
    {
        $request = $this->requestFactory('api/v1/sys/config');
        $request = $request->withHeader('Content-Type', 'application/json');
        $request = $request->withMethod('GET');
        $response = $this->app->process($request, new \Slim\Http\Response());
        $response->getBody()->rewind();
        $this->assertSame((string)$response->getBody(), '[{"id":"1","cfgKey":"AppName","cfgValue":"Slim-MVC-Skeleton"},{"id":"2","cfgKey":"AppVersion","cfgValue":"1.0.0"}]');
    }
    
    public function testGetConfigSecondData()
    {
        $request = $this->requestFactory('api/v1/sys/config/2');
        $request = $request->withHeader('Content-Type', 'application/json');
        $request = $request->withMethod('GET');
        $response = $this->app->process($request, new \Slim\Http\Response());
        $response->getBody()->rewind();
        $this->assertSame((string)$response->getBody(), '[{"id":"2","cfgKey":"AppVersion","cfgValue":"1.0.0"}]');
    }
    
    public function testGetAppVersion()
    {
        $request = $this->requestFactory('api/v1/sys/version');
        $request = $request->withHeader('Content-Type', 'application/json');
        $request = $request->withMethod('GET');
        $response = $this->app->process($request, new \Slim\Http\Response());
        $response->getBody()->rewind();
        $this->assertSame((string)$response->getBody(), '{"version":"@VERSION","build":"@BUILD","fullVersion":"V@VERSION(@BUILD)"}');
    }
}