<?php
declare(strict_types=1);

namespace Amphpanman\ArtaxMiddleware;

use Amp\Artax\Request;
use Amp\Artax\Response;
use Amp\Artax\Client as ArtaxClient;

class Client implements MiddlewareInterface
{
    private $client;

    public function __construct(ArtaxClient $client)
    {
        $this->client = $client;
    }

    public function process(Request $request, DelegateInterface $delegate) : Response
    {
        $promise = $this->client->request($request);

        return \Amp\wait($promise);
    }
}