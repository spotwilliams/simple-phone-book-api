<?php

namespace PhoneBook\Repositories;

use PhoneBook\Models\Contact;

interface ContactRepository extends ReadRepository
{
    const CLASS_NAME = Contact::class;
}
