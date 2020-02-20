<?php

namespace App\Requests;

class ReadContactRequest extends Request
{
    public function id(): int
    {
        return $this->route('id');
    }
}
