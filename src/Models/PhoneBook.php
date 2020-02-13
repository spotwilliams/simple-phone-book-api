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
     * @OneToMany(targetEntity="Contact", mappedBy="phoneBook", cascade={"persist", "remove"})
     */
    private $contacts;

    public function __construct(PhoneBookPayload $payload)
    {
        $this->contacts = new ArrayCollection();
        foreach ($payload->contacts() as $contact) {
            $this->contacts->add(new Contact($contact, $this));
        }
    }

    public function addContact(Contact $contact): PhoneBook
    {
        $this->contacts->add($contact);

        return $this;
    }
}
