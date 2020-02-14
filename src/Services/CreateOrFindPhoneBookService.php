<?php

namespace PhoneBook\Services;

use PhoneBook\Contracts\PhoneBookPayload;
use PhoneBook\Models\PhoneBook;

class CreateOrFindPhoneBookService extends PhoneBookService
{
    public function perform(PhoneBookPayload $payload): PhoneBook
    {
        try {

            if ($phoneBook = $this->findPhoneBook($payload)) {
                return $phoneBook;
            }

            $phoneBook = new PhoneBook($payload);

            return $this->persistRepository->save($phoneBook);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
