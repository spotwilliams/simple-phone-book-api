<?php

require '../bootstrap.php';

$payload = new class implements \PhoneBook\Contracts\PhoneBookPayload {

    public function id(): ?int
    {
        return 1;
    }

    public function contacts(): array
    {
        $contactPayload = new class implements \PhoneBook\Contracts\ContactPayload {
            public function emails(): array
            {
                return ['@1', '@2'];
            }

            public function phones(): array
            {
                return ['123123', '0929291'];
            }

            public function firstName(): string
            {
                return 'Rick';
            }

            public function surName(): string
            {
                return 'Rock';
            }
        };

        return [$contactPayload];
    }
};

$service = \App\Factories\CrudPhoneBookFactory::getService();

$phoneBook = $service->perform($payload);

dump($phoneBook);
