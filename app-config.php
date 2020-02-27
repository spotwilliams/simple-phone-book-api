<?php

// Libs
use Psr\Container\ContainerInterface;

// Business
use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PersistRepository;
use PhoneBook\Repositories\OwnerRepository;
use PhoneBook\Repositories\PhoneBookRepository;
use Psr\Log\LoggerInterface;

// Implementations
use App\Infrastructure\Database\DoctrineContactRepository;
use App\Infrastructure\Database\DoctrinePersistRepository;
use App\Infrastructure\Database\DoctrineOwnerRepository;
use App\Infrastructure\Database\DoctrinePhoneBookRepository;
use Monolog\Logger;

return [
    'entity-manager' => function (ContainerInterface $container) {
        return \App\Factories\DoctrineFactory::EntityManager();
    },
    PersistRepository::class => function (ContainerInterface $container) {
        return new DoctrinePersistRepository($container->get('entity-manager'));
    },
    ContactRepository::class => function (ContainerInterface $container) {
        return new DoctrineContactRepository($container->get('entity-manager'));
    },
    PhoneBookRepository::class => function (ContainerInterface $container) {
        return new DoctrinePhoneBookRepository($container->get('entity-manager'));
    },
    OwnerRepository::class => function (ContainerInterface $container) {
        return new DoctrineOwnerRepository($container->get('entity-manager'));
    },
    LoggerInterface::class => function (ContainerInterface $container) {
        $log =  new Logger('app-phone-book');
        $today = (new DateTime())->format('Y-m-d');

        $log->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__ . "/storage/logs/{$today}.log", Logger::DEBUG));

        return $log;
    },
];
