<?php

namespace PhoneBook\Models;

/**
 * @Entity
 * @Table(name="emails")
 */
class Email
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
    private $email;
    /**
     * Many Emails belongs to one contact
     * @ManyToOne(targetEntity="Contact", inversedBy="emails")
     * @JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;

    public function __construct(string $email, Contact $contact)
    {
        $this->email = $email;
        $this->contact = $contact;
    }
}