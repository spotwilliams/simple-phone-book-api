<?php

namespace PhoneBook\Services;

use PhoneBook\Contracts\ContactPayload;
use PhoneBook\Models\Contact;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\PersistRepository;

class CreateContactService
{
    /** @var PersistRepository */
    private $persistRepository;

    public function __construct(PersistRepository $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function perform(ContactPayload $payload, PhoneBook $book): Contact
    {
        $contact = new Contact($payload, $book);

        $book->addContact($contact);

       $this->persistRepository->save($contact);

       return $contact;
    }
}
