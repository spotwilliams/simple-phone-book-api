<?php

namespace PhoneBook\Models;

use Doctrine\Common\Collections\ArrayCollection;

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
     * @OneToMany(targetEntity="Contact", mappedBy="phoneBook", cascade={"persist"})
     */
    private $contacts;
    /**
     * @OneToOne(targetEntity="Owner",cascade={"persist"})
     */
    private $owner;

    public function __construct(Owner $owner)
    {
        $this->contacts = new ArrayCollection();
        $this->owner = $owner;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addContact(Contact $contact): PhoneBook
    {
        $this->contacts->add($contact);

        return $this;
    }

    public function contacts(): array
    {
        return $this->contacts->toArray();
    }

    public function owner(): Owner
    {
        return $this->owner;
    }
    public function __toString()
    {
        return "$this->id";
    }
}
