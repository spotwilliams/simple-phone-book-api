<?php

namespace PhoneBook\Services;

use PhoneBook\Contracts\PhoneBookPayload;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\PersistRepository;
use PhoneBook\Repositories\PhoneBookRepository;

class CreateOrFindPhoneBook
{
    /** @var PersistRepository */
    private $persistRepository;
    /** @var PhoneBookRepository */
    private $phoneBookRepository;

    public function __construct(PersistRepository $persistRepository, PhoneBookRepository $phoneBookRepository)
    {
        $this->persistRepository = $persistRepository;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function perform(PhoneBookPayload $payload): PhoneBook
    {
        try {
            /** @var PhoneBook $phoneBook */

            if ($payload->id() && $phoneBook = $this->phoneBookRepository->get($payload->id())) {
                return $phoneBook;
            }

            $phoneBook = new PhoneBook($payload);

            return $this->persistRepository->save($phoneBook);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}
