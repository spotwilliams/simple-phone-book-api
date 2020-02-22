<?php

namespace App\Requests;

class DeleteContactRequest
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
}
