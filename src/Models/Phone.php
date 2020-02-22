<?php

namespace PhoneBook\Models;

/**
 * @Entity
 * @Table(name="phones")
 */
class Phone
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
    private $number;
    /**
     * Many Phones belongs to one contact
     * @ManyToOne(targetEntity="Contact", inversedBy="phones")
     * @JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;

    public function __construct(string $number, Contact $contact)
    {
        $this->number = $number;
        $this->contact = $contact;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}