<?php

namespace App\Handlers;

use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Collection;
use PhoneBook\Repositories\ContactRepository;
use Psr\Http\Message\ServerRequestInterface as Request;

class ListContactHandler
{
    const ROUTE = '/contacts';

    /** @var ContactRepository */
    private $contactRepository;
    /** @var ContactTransformer */
    private $contactTransformer;

    public function __construct(ContactRepository $contactRepository, ContactTransformer $contactTransformer)
    {
        $this->contactRepository = $contactRepository;
        $this->contactTransformer = $contactTransformer;
    }

    public function __invoke(Request $request)
    {
        $contacts = $this->contactRepository->all();

        return new Collection($contacts, $this->contactTransformer);
    }
}
