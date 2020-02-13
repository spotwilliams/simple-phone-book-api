<?php
namespace PhoneBook\Contracts;

interface ContactPayload
{
    public function emails(): array;

    public function phones(): array;

    public function firstName(): string;

    public function surName(): string;
}