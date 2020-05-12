<?php

namespace App\Patterns\ChainOfResponsibility;

class Client
{
    private $request;

    private $handler;

    public function __construct(Handler $handler, string $request)
    {
        $this->handler = $handler;
        $this->request = $request;
    }

    public function handle()
    {
        return $this->handler->handle($this->request);
    }
}