<?php
use Amp\Artax\Client as ArtaxClient;
use Amp\Artax\Request;
use Amp\Artax\Response;

use Amphpanman\ArtaxMiddleware\MiddlewareInterface;
use Amphpanman\ArtaxMiddleware\DelegateInterface;

use Amphpanman\ArtaxMiddleware\Client;
use Amphpanman\ArtaxMiddleware\BasicAuthorization;

require_once __DIR__.'/vendor/autoload.php';

$middleware = new \Amphpanman\ArtaxMiddleware\Runner([
    new BasicAuthorization('***'),
    new class implements MiddlewareInterface {
        public function process(Request $request, DelegateInterface $delegate) : Response
        {
            $id = 1;
            $request->setUri('https://api.pay.jp/v1' . sprintf('/customers/%d', $id));
            return $delegate->process($request);
        }
    },
    new Client(new ArtaxClient()),
]);

$response = $middleware->process(new Request());

var_dump($response->getBody());
