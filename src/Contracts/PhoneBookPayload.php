<?php
namespace PhoneBook\Contracts;

interface PhoneBookPayload
{
    public function id(): ?int;

    public function contacts(): array;
}