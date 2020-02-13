<?php

namespace PhoneBook\Models;

use Doctrine\Common\Collections\ArrayCollection;
use PhoneBook\Contracts\ContactPayload;

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
     * @OneToMany(targetEntity="Phone", mappedBy="contact", cascade={"persist", "remove"})
     */
    private $phones;
    /**
     * One Contact has many mails
     * @OneToMany(targetEntity="Email", mappedBy="contact", cascade={"persist", "remove"})
     */
    private $emails;
    /**
     * Many contacts belongs to one phone book
     * @ManyToOne(targetEntity="PhoneBook", inversedBy="contacts")
     * @JoinColumn(name="phone_book_id", referencedColumnName="id")
     */
    private $phoneBook;

    public function __construct(ContactPayload $payload, PhoneBook $phoneBook)
    {
        $this->emails = new ArrayCollection();
        $this->phones = new ArrayCollection();
        $this->firstName = $payload->firstName();
        $this->surName = $payload->surName();
        foreach ($payload->emails() as $email) {
            $this->emails->add(new Email($email, $this));
        }

        foreach ($payload->phones() as $phone) {
            $this->phones->add(new Phone($phone, $this));
        }
        $this->phoneBook = $phoneBook;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
