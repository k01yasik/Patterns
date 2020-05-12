<?php


namespace App\Patterns\ChainOfResponsibility;


abstract class AbstractHandler implements Handler
{
    private Handler $nextHandler;

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(string $request): ?int
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null;
    }
}
