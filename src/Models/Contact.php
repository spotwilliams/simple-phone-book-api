<?php

namespace PhoneBook\Models;

/**
 * @Entity
 * @Table(name="contacts")
 */
class Contact
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    private $firstName;
    private $surName;
    private $phones;
    private $mails;
    /**
     * Many contacts belogns to one phone book
     * @ManyToOne(targetEntity="PhoneBook", inversedBy="contacts")
     * @JoinColumn(name="phone_book_id", referencedColumnName="id")
     */
    private $phoneBook;
}