<?php

namespace App\Handlers;

use App\Requests\CreateContactRequest;
use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Item;
use PhoneBook\Repositories\PhoneBookRepository;
use PhoneBook\Services\CreateContactService;

class CreateContactHandler
{
    const ROUTE = '/contacts';
    /** @var CreateContactService  */
    private $createContactService;
    /** @var ContactTransformer  */
    private $contactTransformer;
    /** @var PhoneBookRepository */
    private $bookRepository;

    public function __construct(CreateContactService $createContactService, ContactTransformer $contactTransformer, PhoneBookRepository $bookRepository)
    {
        $this->createContactService = $createContactService;
        $this->contactTransformer = $contactTransformer;
        $this->bookRepository = $bookRepository;
    }

    public function __invoke(CreateContactRequest $request)
    {
        $phoneBook = $this->bookRepository->findByOwner($request->owner());

        $contact = $this->createContactService->perform($request, $phoneBook);

        return new Item($contact, $this->contactTransformer);
    }
}
