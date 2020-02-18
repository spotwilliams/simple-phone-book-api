<?php


namespace PhoneBook\Services;

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

    public function perform(int $id): void
    {
        $contact = $this->contactRepository->get($id);

        $this->persistRepository->remove($contact);

    }
}
