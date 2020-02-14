<?php

namespace PhoneBook\Services;

use PhoneBook\Contracts\PhoneBookPayload;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\PersistRepository;
use PhoneBook\Repositories\PhoneBookRepository;

abstract class PhoneBookService
{
    /** @var PersistRepository */
    protected $persistRepository;
    /** @var PhoneBookRepository */
    protected $phoneBookRepository;

    public function __construct(PersistRepository $persistRepository, PhoneBookRepository $phoneBookRepository)
    {
        $this->persistRepository = $persistRepository;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function findPhoneBook(PhoneBookPayload $payload): ?PhoneBook
    {
        /** @var PhoneBook $phoneBook */
        if ($payload->id() && $phoneBook = $this->phoneBookRepository->get($payload->id())) {
            return $phoneBook;
        }
        return null;
    }
}
