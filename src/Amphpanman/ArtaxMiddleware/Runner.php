<?php
declare(strict_types=1);

namespace Amphpanman\ArtaxMiddleware;

use Amp\Artax\Request;
use Amp\Artax\Response;

class Runner implements DelegateInterface
{
    private $queue = [];

    public function __construct(array $queue)
    {
        $this->queue = $queue;
    }

    public function process(Request $request) : Response
    {
        if ($this->queue) {
            $middleware =  array_shift($this->queue);
            return $middleware->process($request, $this);
        }
    }
}