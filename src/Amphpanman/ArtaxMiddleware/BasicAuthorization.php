<?php
declare(strict_types=1);

namespace Amphpanman\ArtaxMiddleware;

use Amp\Artax\Request;
use Amp\Artax\Response;

class BasicAuthorization implements MiddlewareInterface
{
    private $username;
    private $password;

    public function __construct(string $username, string $password = null)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function process(Request $request, DelegateInterface $delegate) : Response
    {
        $request->setHeader('Authorization: Basic ', base64_encode("{$this->username}:{$this->password}"));
        return $delegate->process($request);
    }
}