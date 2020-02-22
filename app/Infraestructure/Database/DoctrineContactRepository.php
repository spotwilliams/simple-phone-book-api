<?php

namespace App\Infrastructure\Database;

use Doctrine\ORM\EntityNotFoundException;
use PhoneBook\Models\Contact;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\ContactRepository;

class DoctrineContactRepository extends DoctrineReadRepository implements ContactRepository
{
    public function getEntity()
    {
        return Contact::class;
    }

    public function findInPhoneBook(int $id, PhoneBook $phoneBook): Contact
    {
        $queryBuilder = $this->createQueryBuilder('contact');
        $queryBuilder->where($queryBuilder->expr()->eq('contact.id', $id));
        $queryBuilder->andWhere($queryBuilder->expr()->eq('contact.phoneBook', $phoneBook));

        if ($entity = $queryBuilder->getQuery()->getOneOrNullResult()) {
            return $entity ;
        }

        throw new EntityNotFoundException($this->getEntity());
    }

    public function listByPhoneBook(PhoneBook $phoneBook): array
    {
        $queryBuilder = $this->createQueryBuilder('contact');
        $queryBuilder->where($queryBuilder->expr()->eq('contact.phoneBook', $phoneBook));

        return $queryBuilder->getQuery()->getResult();
    }
}
