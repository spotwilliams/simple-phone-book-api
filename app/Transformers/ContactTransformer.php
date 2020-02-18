<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use PhoneBook\Models\Contact;

class ContactTransformer extends TransformerAbstract
{
    public function transform(Contact $contact)
    {
        return [
            'id' => $contact->getId()
        ];
    }
}