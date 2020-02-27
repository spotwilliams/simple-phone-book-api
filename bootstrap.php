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

$isDevMode = (getenv('ENV') ?? 'prod') === 'dev';

$errorMiddleware = $app->addErrorMiddleware($isDevMode, true, true);

$errorMiddleware->setDefaultErrorHandler(new \App\Errors\ErrorHandler($app->getCallableResolver(), $app->getResponseFactory(), $app->getContainer()->get(\Psr\Log\LoggerInterface::class)));

$errorHandler = $errorMiddleware->getDefaultErrorHandler();

$errorHandler->setDefaultErrorRenderer('application/json', \App\Errors\ErrorRenderer::class);

