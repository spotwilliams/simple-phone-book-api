<?php

namespace PhoneBook\Services;

use PhoneBook\Models\Owner;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\OwnerRepository;
use PhoneBook\Repositories\PersistRepository;
use PhoneBook\Repositories\PhoneBookRepository;

class AuthorizeAccessToPhoneBookService
{
    /** @var PersistRepository */
    private $persistRepository;
    /** @var OwnerRepository */
    private $ownerRepository;
    /** @var PhoneBookRepository */
    private $phoneBookRepository;

    public function __construct(PersistRepository $persistRepository, OwnerRepository $ownerRepository, PhoneBookRepository $phoneBookRepository)
    {
        $this->persistRepository = $persistRepository;
        $this->ownerRepository = $ownerRepository;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function perform(string $token = null): PhoneBook
    {
        if (!$token) {
            $owner = new Owner();
        } else {
            $owner = $this->ownerRepository->findOneBy(['accessToken' => $token]);
        }

        /** @var PhoneBook $book */
        $book = $this->phoneBookRepository->findOneBy(['owner' => $owner]);

        if (!$book) {
            $book = $this->persistRepository->save(new PhoneBook($owner));
        }

        return $book;
    }
}
