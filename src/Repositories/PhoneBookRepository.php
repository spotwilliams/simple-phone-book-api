<?php

namespace PhoneBook\Repositories;

use PhoneBook\Models\Owner;
use PhoneBook\Models\PhoneBook;

interface PhoneBookRepository extends ReadRepository
{
    const CLASS_NAME = PhoneBook::class;

    public function findByOwner(Owner $owner): PhoneBook;
}
