<?php


namespace PhoneBook\Services;

use PhoneBook\Models\PhoneBook;
use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PersistRepository;

class DeleteContactService
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

    public function perform(int $id, PhoneBook $phoneBook): void
    {
        $contact = $this->contactRepository->findInPhoneBook($id, $phoneBook);

        $this->persistRepository->remove($contact);

    }
}
