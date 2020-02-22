<?php

namespace App\Requests;

use PhoneBook\Contracts\ContactPayload;

class UpdateContactRequest implements ContactPayload
{
    use RequestAccessor;

    /** @var Request  */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function id(): int
    {
        return $this->route('id');
    }
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
