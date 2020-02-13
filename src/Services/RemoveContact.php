<?php


namespace PhoneBook\Services;

use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PersistRepository;

class RemoveContact
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
//    public function removeContact(Contact $contact)
//    {
//        /** @var Contact $value */
//        foreach ($this->contacts as $key => $value) {
//            if ($value->getId() === $contact->getId()) {
//                $this->contacts->remove($key);
//                break;
//            }
//        }
//        $this->persistRepository->save($book);
//
//        return $this;
//    }
}
