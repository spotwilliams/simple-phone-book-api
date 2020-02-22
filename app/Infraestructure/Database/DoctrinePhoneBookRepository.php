<?php

namespace App\Infrastructure\Database;

use Doctrine\ORM\EntityNotFoundException;
use PhoneBook\Models\Owner;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\PhoneBookRepository;

class DoctrinePhoneBookRepository extends DoctrineReadRepository implements PhoneBookRepository
{
    public function getEntity()
    {
        return PhoneBook::class;
    }

    public function findByOwner(Owner $owner): PhoneBook
    {
        $queryBuilder = $this->createQueryBuilder('phoneBook');
        $queryBuilder->where($queryBuilder->expr()->eq('phoneBook.owner', $owner));

        if ($entity = $queryBuilder->getQuery()->getOneOrNullResult()) {
            return $entity ;
        }

        throw new EntityNotFoundException($this->getEntity());
    }
}
