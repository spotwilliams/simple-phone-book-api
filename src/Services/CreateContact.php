<?php

namespace PhoneBook\Services;

use PhoneBook\Contracts\ContactPayload;
use PhoneBook\Models\Contact;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\PersistRepository;

class CreateContact
{
    /** @var PersistRepository */
    private $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function perform(ContactPayload $payload, PhoneBook $book)
    {
        $book->addContact(new Contact($payload, $book));

        $this->persistRepository->save($book);
    }
}
