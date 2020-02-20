<?php

namespace App\Requests;

class DeleteContactRequest extends Request
{
    public function id(): int
    {
        return $this->route('id');
    }
}
