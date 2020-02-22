<?php

namespace App\Handlers;

use App\Requests\ReadContactRequest;
use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use PhoneBook\Repositories\ContactRepository;
use PhoneBook\Repositories\PhoneBookRepository;

class ReadContactHandler
{
    const ROUTE = '/contacts/{id}';

    /** @var ContactRepository */
    private $contactRepository;
    /** @var ContactTransformer */
    private $contactTransformer;
    /** @var PhoneBookRepository  */
    private $phoneBookRepository;

    public function __construct(ContactRepository $contactRepository, PhoneBookRepository $phoneBookRepository, ContactTransformer $contactTransformer)
    {
        $this->contactRepository = $contactRepository;
        $this->contactTransformer = $contactTransformer;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function __invoke(ReadContactRequest $request)
    {
        $phoneBook = $this->phoneBookRepository->findByOwner($request->owner());

        $contact = $this->contactRepository->findInPhoneBook($request->id(), $phoneBook);

        return new Item($contact, $this->contactTransformer);
    }
}
