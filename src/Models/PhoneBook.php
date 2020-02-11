<?php

namespace PhoneBook\Models;

use Doctrine\Common\Collections\ArrayCollection;
use PhoneBook\Contracts\PhoneBookPayload;

/**
 * @Entity
 * @Table(name="phone_books")
 */
class PhoneBook
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * One PhoneBook has many contacts
     * @OneToMany(targetEntity="Contact", mappedBy="phoneBook")
     */
    private $contacts;

    public function __construct(PhoneBookPayload $payload)
    {
        $this->contacts = new ArrayCollection();
    }
}