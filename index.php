<?php

require './vendor/autoload.php';

$payload = new class implements \PhoneBook\Contracts\PhoneBookPayload {

    public function id(): ?int
    {
        return null;
    }

    public function contacts(): array
    {
        return [];
    }
};

$book = new \PhoneBook\Models\PhoneBook($payload);

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

$book->addContact(new \PhoneBook\Models\Contact($contactPayload));

dd($book);