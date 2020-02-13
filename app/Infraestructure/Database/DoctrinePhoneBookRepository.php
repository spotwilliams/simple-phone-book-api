<?php

namespace App\Infrastructure\Database;

use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\PhoneBookRepository;

class DoctrinePhoneBookRepository extends DoctrineReadRepository implements PhoneBookRepository
{
    public function getEntity()
    {
        return PhoneBook::class;
    }
}
