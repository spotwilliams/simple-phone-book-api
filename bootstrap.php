<?php

// DotEnv's load
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Nice exceptions
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// DI
$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(true);

$builder->addDefinitions(__DIR__ . '/app-config.php');


$builder->enableCompilation(__DIR__ . '/storage');
$builder->writeProxiesToFile(true, __DIR__ . '/storage/proxies');

$app = \DI\Bridge\Slim\Bridge::create($container = $builder->build());

$responseManager = new \League\Fractal\Manager();
