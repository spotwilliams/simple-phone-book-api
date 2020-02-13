<?php

namespace App\Factories;

use PhoneBook\Services\CreateOrFindPhoneBook;

class CrudPhoneBookFactory
{
    static function getService(): CreateOrFindPhoneBook
    {
        return new CreateOrFindPhoneBook(DoctrineFactory::PersistRepository(), DoctrineFactory::PhoneBookRepository());
    }
}
