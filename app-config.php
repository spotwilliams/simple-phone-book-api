<?php

// Libs
use Psr\Container\ContainerInterface;

// Business
use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PersistRepository;
use PhoneBook\Repositories\PhoneBookRepository;

// Implementations
use App\Infrastructure\Database\DoctrineContactRepository;
use App\Infrastructure\Database\DoctrinePersistRepository;
use App\Infrastructure\Database\DoctrinePhoneBookRepository;

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
];
