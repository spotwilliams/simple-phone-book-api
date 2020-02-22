<?php


namespace PhoneBook\Services;

use PhoneBook\Contracts\ContactPayload;
use PhoneBook\Exceptions\ContactNotFound;
use PhoneBook\Models\Contact;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PersistRepository;

class UpdateContactService
{
    /** @var PersistRepository */
    private $persistRepository;
    /** @var ContactRepository */
    private $contactRepository;

    public function __construct(PersistRepository $persistRepository, ContactRepository $contactRepository)
    {
        $this->persistRepository = $persistRepository;
        $this->contactRepository = $contactRepository;
    }

    public function perform(int $id, PhoneBook $phoneBook, ContactPayload $payload): Contact
    {
        $contact = $this->contactRepository->findInPhoneBook($id, $phoneBook);

        if ($contact) {
            $contact->update($payload);
            $this->persistRepository->save($contact);

            return $contact;
        }

        throw new ContactNotFound();
    }
}
