<?php

namespace App\Factories;

use PhoneBook\Services\CreateOrFindPhoneBookService;

class CrudPhoneBookFactory
{
    static function CreateOrFindPhoneBook(): CreateOrFindPhoneBookService
    {
        return new CreateOrFindPhoneBookService(DoctrineFactory::PersistRepository(), DoctrineFactory::PhoneBookRepository());
    }
}
