<?php

namespace App\Factories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class DoctrineFactory
{
    public static function EntityManager(): EntityManager
    {
        $paths = array("../../src/Models/");

        $isDevMode = (getenv('ENV') ?? 'prod') === 'dev';

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'host'     => getenv('DB_HOST'),
            'user'     => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'dbname'   => getenv('DB_NAME'),
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        return  EntityManager::create($dbParams, $config);
    }
}
