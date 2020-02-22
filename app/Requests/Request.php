<?php

namespace App\Requests;

use App\Http\DataExtractor;
use GuzzleHttp\Psr7\ServerRequest;
use PhoneBook\Models\Owner;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

class Request implements ServerRequestInterface
{
    use DataExtractor;
    use RequestDecorator;

    /** @var array  */
    private $data;
    /** @var RequestInterface | ServerRequest */
    protected $request;
    /** @var Owner  */
    private $owner;

    public function __construct(RequestInterface $request, Owner $owner)
    {
        $this->data = json_decode($request->getBody(), true);
        $this->request = $request;
        $this->owner = $owner;
    }

    public function input(string $name)
    {
        return $this->data[$name];
    }

    public function route(string $name)
    {
        return $this->request->getAttribute('__route__')->getArgument($name);
    }

    public function owner(): Owner
    {
        return $this->owner;
    }
}
