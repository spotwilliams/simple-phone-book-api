<?php

namespace App\Factories;

use PhoneBook\Services\CreateContactService;
use PhoneBook\Services\DeleteContactService;
use PhoneBook\Services\UpdateContactService;

class CrudContactFactory
{
    static function CreateContactService(): CreateContactService
    {
        return new CreateContactService(DoctrineFactory::PersistRepository());
    }

    static function UpdateContactService(): UpdateContactService
    {
        return new UpdateContactService();

    }

    static function DeleteContactService(): DeleteContactService
    {
        return new DeleteContactService(DoctrineFactory::PersistRepository(), DoctrineFactory::ContactRepository());
    }
}
