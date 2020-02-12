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
    /**
     * @Column(type="string")
     */
    private $firstName;
    /**
     * @Column(type="string")
     */
    private $surName;
    /**
     * One Contact has many phones
     * @OneToMany(targetEntity="Phone", mappedBy="contact")
     */
    private $phones;
    private $mails;
    /**
     * Many contacts belongs to one phone book
     * @ManyToOne(targetEntity="PhoneBook", inversedBy="contacts")
     * @JoinColumn(name="phone_book_id", referencedColumnName="id")
     */
    private $phoneBook;
}