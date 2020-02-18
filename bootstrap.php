<?php

// DotEnv's load
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Doctrine's load
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("./src/Models/");
$isDevMode = (getenv('ENV') ?? 'prod') === 'dev';

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => getenv('DB_HOST'),
    'user'     => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'dbname'   => getenv('DB_NAME'),
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$entityManager = EntityManager::create($dbParams, $config);

// Nice exceptions
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// DI
$builder = new \DI\ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/app-config.php');

dd($builder->build()->get(\PhoneBook\Repositories\PersistRepository::class));
$app = \DI\Bridge\Slim\Bridge::create($builder->build());
