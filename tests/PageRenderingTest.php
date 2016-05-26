<?php

class PageRenderingTest extends Slim3TestCase
{
    public function testIndexRender()
    {
        $request = $this->requestFactory('/');
        $request = $request->withMethod('GET');
        $response = $this->app->process($request, new \Slim\Http\Response());
        $response->getBody()->rewind();
        $this->assertEquals(200, $response->getStatusCode());
    }
}