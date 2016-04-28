<?php
// Routes

$app->get('/', 'App\Controller\IndexController:index')
    ->setName('index');

$app->group('/api/v1', function () {
    $this->get('/sys/config[/{id}]', 'App\Controller\SystemController:getConfig')
         ->setName('api_get_config');
         
    $this->get('/sys/version', 'App\Controller\SystemController:getVersion')
         ->setName('api_get_app_version');
});
