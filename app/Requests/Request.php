<?php

namespace App\Requests;

use App\Http\DataExtractor;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\RequestInterface;
class Request
{
    use DataExtractor;

    /** @var array  */
    private $data;
    /** @var RequestInterface | ServerRequest */
    protected $request;

    public function __construct(RequestInterface $request)
    {
        $this->data = json_decode($request->getBody(), true);
        $this->request = $request;
    }

    protected function input(string $name)
    {
        return $this->data[$name];
    }

    protected function route(string $name)
    {
        return $this->request->getAttribute('__route__')->getArgument($name);
    }
}
