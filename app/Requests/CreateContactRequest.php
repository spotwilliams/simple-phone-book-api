<?php

namespace App\Requests;

use PhoneBook\Contracts\ContactPayload;
use Psr\Http\Message\ServerRequestInterface as Request;

class CreateContactRequest implements ContactPayload
{
    /** @var Request  */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function emails(): array
    {
        return $this->request->getAttribute('emails');
    }

    public function phones(): array
    {
        return $this->request->getAttribute('phones');
    }

    public function firstName(): string
    {
        return $this->request->getAttribute('firstName');
    }

    public function surName(): string
    {
        return $this->request->getAttribute('surName');
    }
}