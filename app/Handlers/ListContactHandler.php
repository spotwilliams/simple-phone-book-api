<?php

namespace App\Handlers;

use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Collection;
use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PhoneBookRepository;
use App\Requests\Request;

class ListContactHandler
{
    const ROUTE = '/contacts';

    /** @var ContactRepository */
    private $contactRepository;
    /** @var ContactTransformer */
    private $contactTransformer;
    /**
     * @var PhoneBookRepository
     */
    private $phoneBookRepository;

    public function __construct(ContactRepository $contactRepository, PhoneBookRepository $phoneBookRepository, ContactTransformer $contactTransformer)
    {
        $this->contactRepository = $contactRepository;
        $this->contactTransformer = $contactTransformer;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function __invoke(Request $request)
    {
        $phoneBook = $this->phoneBookRepository->findByOwner($request->owner());

        $contacts = $this->contactRepository->listByPhoneBook($phoneBook);

        return new Collection($contacts, $this->contactTransformer);
    }
}
