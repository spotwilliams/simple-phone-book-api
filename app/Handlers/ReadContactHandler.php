<?php

namespace App\Handlers;

use App\Requests\ReadContactRequest;
use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Collection;
use PhoneBook\Repositories\ContactRepository;

class ReadContactHandler
{
    const ROUTE = '/contacts/{id}';

    /** @var ContactRepository */
    private $contactRepository;
    /** @var ContactTransformer */
    private $contactTransformer;

    public function __construct(ContactRepository $contactRepository, ContactTransformer $contactTransformer)
    {
        $this->contactRepository = $contactRepository;
        $this->contactTransformer = $contactTransformer;
    }

    public function __invoke(ReadContactRequest $request)
    {
        $contacts = $this->contactRepository->find($request->id());

        return new Collection($contacts, $this->contactTransformer);
    }
}
