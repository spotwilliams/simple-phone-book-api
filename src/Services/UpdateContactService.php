<?php


namespace PhoneBook\Services;

use PhoneBook\Contracts\ContactPayload;
use PhoneBook\Exceptions\ContactNotFound;
use PhoneBook\Models\Contact;
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

    public function perform(int $contactId, int $phoneBookId, ContactPayload $payload): Contact
    {
        $contact = current($this->contactRepository->findBy([
            'id' => $contactId,
            'phoneBook' => $phoneBookId
        ]));

        if ($contact) {
            $contact->update($payload);
            $this->persistRepository->save($contact);

            return $contact;
        }

        throw new ContactNotFound();
    }
}
