<?php

namespace App\Infrastructure\Database;

use PhoneBook\Models\Contact;
use PhoneBook\Repositories\ContactRepository;

class DoctrineContactRepository extends DoctrineReadRepository implements ContactRepository
{
    public function getEntity()
    {
        return Contact::class;
    }
}
