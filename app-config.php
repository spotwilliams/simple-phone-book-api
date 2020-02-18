<?php

return [
    \PhoneBook\Repositories\PersistRepository::class => DI\create(\App\Infrastructure\Database\DoctrinePersistRepository::class),
];