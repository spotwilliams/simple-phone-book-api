<?php

namespace App\Handlers;

use App\Requests\CreateContactRequest;
use App\Transformers\ContactTransformer;
use League\Fractal\Resource\Item;
use PhoneBook\Models\PhoneBook;
use PhoneBook\Services\CreateContactService;
use Psr\Http\Message\ResponseInterface as Response;

class CreateContactHandler
{
    const ROUTE = '/contacts';
    /** @var CreateContactService  */
    private $createContactService;
    /** @var PhoneBook  */
    private $phoneBook;
    /** @var ContactTransformer */
    private $transformer;
    /** @var ContactTransformer  */
    private $contactTransformer;

    public function __construct(CreateContactService $createContactService, PhoneBook $phoneBook, ContactTransformer $contactTransformer)
    {
        $this->createContactService = $createContactService;
        $this->phoneBook = $phoneBook;
        $this->contactTransformer = $contactTransformer;
        dd($this);
    }

    public function __invoke(CreateContactRequest $request, Response $response)
    {
        $contact = $this->createContactService->perform($request, $this->phoneBook);;

        return $response->withStatus(200)
            ->getBody()
            ->write(new Item($contact, $this->transformer));
    }
}