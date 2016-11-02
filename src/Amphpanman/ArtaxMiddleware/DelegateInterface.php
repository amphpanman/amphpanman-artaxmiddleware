<?php
namespace Amphpanman\ArtaxMiddleware;

use Amp\Artax\Request;
use Amp\Artax\Response;

interface DelegateInterface
{
    public function process(Request $request) : Response;
}