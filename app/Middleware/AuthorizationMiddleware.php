<?php

namespace App\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use PhoneBook\Models\Owner;
use PhoneBook\Repositories\OwnerRepository;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use App\Requests\Request as AppRequest;

class AuthorizationMiddleware
{
    /** @var OwnerRepository */
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function __invoke(Request $request, RequestHandler $handler): ResponseInterface
    {
        /** @var Owner $owner */
        if (($token = $this->getToken($request)) and ($owner = $this->getOwner($token))) {

            return $handler->handle(new AppRequest($request, $owner));
        }

        $response = new Response(401);

        $message = ['error' => 'Please request authorization to access to your phone Book'];

        $response->getBody()->write(json_encode($message));

        return $response;
    }

    private function getToken(Request $request): ?string
    {
        $header = $request->getHeaderLine('token');
        if (!empty($header)) {
            return $header;
        }

        return null;
    }

    private function getOwner(string $token): ?Owner
    {
        return $this->ownerRepository->findOneBy(['accessToken' => $token]);
    }
}