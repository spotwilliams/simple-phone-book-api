<?php

namespace PhoneBook\Repositories;

use PhoneBook\Models\Owner;

interface OwnerRepository extends ReadRepository
{
    const CLASS_NAME = Owner::class;
}
