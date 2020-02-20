<?php

namespace App\Requests;

use PhoneBook\Contracts\ContactPayload;

class CreateContactRequest extends Request implements ContactPayload
{
    public function emails(): array
    {
        return $this->input('emails');
    }

    public function phones(): array
    {
        return $this->input('phones');
    }

    public function firstName(): string
    {
        return $this->input('firstName');
    }

    public function surName(): string
    {
        return $this->input('surName');
    }
}
