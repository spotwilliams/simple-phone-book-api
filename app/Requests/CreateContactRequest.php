<?php

namespace App\Requests;

use PhoneBook\Contracts\ContactPayload;
use Respect\Validation\Validator;

class CreateContactRequest implements ContactPayload
{
    use RequestAccessor;

    /** @var Request  */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->validate();
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

    private function validate()
    {
        Validator::notOptional()->check($this->firstName());
        Validator::notOptional()->check($this->surName());
        Validator::arrayVal()->each(Validator::email())->check($this->emails());
        Validator::arrayVal()->each(Validator::phone())->check($this->phones());
    }
}
