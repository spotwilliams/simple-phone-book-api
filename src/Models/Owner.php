<?php

namespace PhoneBook\Models;

class Owner
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $accessToken;

    public function __construct()
    {
        $this->accessToken = bin2hex(random_bytes(20));
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }


}
