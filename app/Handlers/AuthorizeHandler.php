<?php

namespace App\Handlers;

use App\Transformers\OwnerTransformer;
use League\Fractal\Resource\Item;
use PhoneBook\Services\AuthorizeAccessToPhoneBookService;
use Psr\Http\Message\RequestInterface;

class AuthorizeHandler
{
    const ROUTE = '/authorize';

    /** @var AuthorizeAccessToPhoneBookService */
    private $accessToPhoneBookService;
    /** @var OwnerTransformer */
    private $ownerTransformer;

    public function __construct(AuthorizeAccessToPhoneBookService $accessToPhoneBookService, OwnerTransformer $ownerTransformer)
    {
        $this->accessToPhoneBookService = $accessToPhoneBookService;
        $this->ownerTransformer = $ownerTransformer;
    }

    public function __invoke(RequestInterface $request)
    {
        $book = $this->accessToPhoneBookService->perform();

        return new Item($book->owner(), $this->ownerTransformer);
    }
}
