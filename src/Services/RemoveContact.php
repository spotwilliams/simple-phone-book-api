<?php


namespace PhoneBook\Services;

use PhoneBook\Models\Contact;


class RemoveContact
{

    public function removeContact(Contact $contact)
    {
        /** @var Contact $value */
        foreach ($this->contacts as $key => $value) {
            if ($value->getId() === $contact->getId()) {
                $this->contacts->remove($key);
                break;
            }
        }

        return $this;
    }

}