<?php

namespace App\Handlers;

use App\Requests\UpdateContactRequest;
use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Item;
use PhoneBook\Services\UpdateContactService;

class UpdateContactHandler
{
    const ROUTE = '/contacts/{id}';
    /** @var UpdateContactService */
    private $updateContactService;
    /** @var ContactTransformer */
    private $contactTransformer;

    public function __construct(UpdateContactService $updateContactService, ContactTransformer $contactTransformer)
    {
        $this->updateContactService = $updateContactService;
        $this->contactTransformer = $contactTransformer;
    }

    public function __invoke(UpdateContactRequest $request)
    {
        $contact = $this->updateContactService->perform($request->id(), 1, $request);

        return new Item($contact, $this->contactTransformer);
    }
}
