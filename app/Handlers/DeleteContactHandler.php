<?php

namespace App\Handlers;

use App\Requests\DeleteContactRequest;
use PhoneBook\Repositories\OwnerRepository;
use PhoneBook\Repositories\PhoneBookRepository;
use PhoneBook\Services\DeleteContactService;

class DeleteContactHandler
{
    const ROUTE = '/contacts/{id}';
    /** @var DeleteContactService */
    private $deleteContactService;
    /** @var PhoneBookRepository  */
    private $phoneBookRepository;

    public function __construct(DeleteContactService $deleteContactService, PhoneBookRepository $phoneBookRepository )
    {
        $this->deleteContactService = $deleteContactService;
        $this->phoneBookRepository = $phoneBookRepository;
    }

    public function __invoke(DeleteContactRequest $request)
    {
        $phoneBook = $this->phoneBookRepository->findByOwner($request->owner());

        $this->deleteContactService->perform($request->id(), $phoneBook);

        return null;
    }
}
