<?php

namespace App\Infrastructure\Database;

use PhoneBook\Models\Owner;
use PhoneBook\Repositories\OwnerRepository;

class DoctrineOwnerRepository extends DoctrineReadRepository implements OwnerRepository
{
    public function getEntity()
    {
        return Owner::class;
    }
}
