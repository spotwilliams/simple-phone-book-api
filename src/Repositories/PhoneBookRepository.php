<?php

namespace PhoneBook\Repositories;

use PhoneBook\Models\PhoneBook;

interface PhoneBookRepository extends ReadRepository
{
    const CLASS_NAME = PhoneBook::class;
}
