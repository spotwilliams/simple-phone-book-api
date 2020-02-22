<?php

namespace App\Requests;
use PhoneBook\Models\Owner;

/**
 * @property Request $request
 */
trait RequestAccessor
{
    public function input(string $name)
    {
        return $this->request->input($name);
    }

    public function route(string $name)
    {
        return $this->request->route($name);
    }

    public function owner(): Owner
    {
        return $this->request->owner();
    }
}