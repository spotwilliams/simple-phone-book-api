<?php

namespace App\Handlers;

use App\Requests\UpdateContactRequest;
use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Item;
use PhoneBook\Repositories\PhoneBookRepository;
use PhoneBook\Services\UpdateContactService;

class UpdateContactHandler
{
    const ROUTE = '/contacts/{id}';

    /** @var UpdateContactService */
    private $updateContactService;
    /** @var ContactTransformer */
    private $contactTransformer;
    /** @var PhoneBookRepository  */
    private $phoneBookRepository;

    public function __construct(UpdateContactService $updateContactService, PhoneBookRepository $phoneBookRepository, ContactTransformer $contactTransformer)
    {
        $this->updateContactService = $updateContactService;
        $this->contactTransformer = $contactTransformer;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function __invoke(UpdateContactRequest $request)
    {
        $phoneBook = $this->phoneBookRepository->findByOwner($request->owner());
        $contact = $this->updateContactService->perform($request->id(), $phoneBook, $request);

        return new Item($contact, $this->contactTransformer);
    }
}
