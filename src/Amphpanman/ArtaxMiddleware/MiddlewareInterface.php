<?php
declare(strict_types=1);

namespace Amphpanman\ArtaxMiddleware;

use Amp\Artax\Request;
use Amp\Artax\Response;

interface MiddlewareInterface
{
    public function process(Request $request, DelegateInterface $delegate) : Response;
}