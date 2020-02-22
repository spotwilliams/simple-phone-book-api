<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$paths = array("src/Models/");

$isDevMode = (getenv('ENV') ?? 'prod') === 'dev';

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => getenv('DB_HOST'),
    'user'     => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'dbname'   => getenv('DB_NAME'),
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

return ConsoleRunner::createHelperSet(EntityManager::create($dbParams, $config));