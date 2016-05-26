<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($container) {
    $settings = $container->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $container->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// FluentPDO
$container['fpdo'] = function ($container) {
    $settings = $container->get('settings');
    $dsn = 'sqlite:' . $settings['db']['database'];
    $pdo = new PDO($dsn);
    $fpdo = new FluentPDO($pdo);
    return $fpdo;
};

// PDO
$container['pdo'] = function ($container) {
    $settings = $container->get('settings');
    $dsn = 'sqlite:' . $settings['db']['database'];
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable emulate prepared statements
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Set default fetch mode
    return $pdo;
};

// monolog
$container['logger'] = function ($container) {
    $settings = $container->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Model factories
// -----------------------------------------------------------------------------
$container['cfgModel'] = function ($container) {
    $settings = $container->get('settings');
    $cfgModel = new App\Model\ConfigurationModel($container->get('pdo'));
    return $cfgModel;
};

$container['cfgModelFPDO'] = function ($container) {
    $settings = $container->get('settings');
    $cfgModelFPDO = new App\Model\ConfigurationModelFPDO($container->get('fpdo'));
    return $cfgModelFPDO;
};

$container['cfgModelMock'] = function ($container) {
    $settings = $container->get('settings');
    $cfgModelMock = new App\Model\ConfigurationModelMock();
    return $cfgModelMock;
};

// -----------------------------------------------------------------------------
// Controller factories
// -----------------------------------------------------------------------------

$container['App\Controller\IndexController'] = function ($container) {
    $view = $container->get('view');
    $logger = $container->get('logger');
    return new App\Controller\IndexController($view, $logger);
};

$container['App\Controller\SystemController'] = function ($container) {
    $logger = $container->get('logger');
    $cfgModel = $container->get('cfgModel');
    // $cfgModel = $container->get('cfgModelFPDO');
    // $cfgModel = $container->get('cfgModelMock');
    return new App\Controller\SystemController($logger, $cfgModel);
};