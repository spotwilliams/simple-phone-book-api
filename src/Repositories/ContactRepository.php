<?php

namespace PhoneBook\Repositories;

use PhoneBook\Models\Contact;
use PhoneBook\Models\PhoneBook;

interface ContactRepository extends ReadRepository
{
    const CLASS_NAME = Contact::class;

    public function findInPhoneBook(int $id, PhoneBook $phoneBook): Contact;

    public function listByPhoneBook(PhoneBook $phoneBook): array;
}
