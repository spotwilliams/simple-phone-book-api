<?php

namespace App\Factories;

use App\Infrastructure\Database\DoctrineContactRepository;
use App\Infrastructure\Database\DoctrinePersistRepository;
use App\Infrastructure\Database\DoctrinePhoneBookRepository;
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


    public static function PersistRepository(): DoctrinePersistRepository
    {
        return new DoctrinePersistRepository(static::EntityManager());
    }

    public static function ContactRepository(): DoctrineContactRepository
    {
        return new DoctrineContactRepository(static::EntityManager());
    }

    public static function PhoneBookRepository(): DoctrinePhoneBookRepository
    {
        return new DoctrinePhoneBookRepository(static::EntityManager());
    }
}
