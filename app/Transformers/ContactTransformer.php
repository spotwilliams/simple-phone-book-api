<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use PhoneBook\Models\Contact;
use PhoneBook\Models\Email;
use PhoneBook\Models\Phone;

class ContactTransformer extends TransformerAbstract
{
    public function transform(Contact $contact)
    {
        return [
            'id' => $contact->getId(),
            'firstName' => $contact->getFirstName(),
            'surName' => $contact->getSurName(),
            'phones' => array_map(function (Phone $phone) { return $phone->getNumber(); }, $contact->getPhones()),
            'emails' => array_map(function (Email $email) { return $email->getEmail(); }, $contact->getEmails()),
        ];
    }
}