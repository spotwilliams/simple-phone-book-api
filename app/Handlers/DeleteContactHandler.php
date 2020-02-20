<?php

namespace App\Handlers;

use App\Requests\DeleteContactRequest;
use PhoneBook\Services\DeleteContactService;

class DeleteContactHandler
{
    const ROUTE = '/contacts/{id}';
    /** @var DeleteContactService */
    private $deleteContactService;

    public function __construct(DeleteContactService $deleteContactService)
    {
        $this->deleteContactService = $deleteContactService;
    }

    public function __invoke(DeleteContactRequest $request)
    {
        $this->deleteContactService->perform($request->id());

        return null;
    }
}
