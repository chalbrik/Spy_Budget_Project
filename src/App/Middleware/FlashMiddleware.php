<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class FlashMiddleware implements MiddlewareInterface //to jest middleware w którym następuje dodwanie zmiennych globalnych errors do naszego template wyrenderowanego na stronie
{

    public function __construct(private TemplateEngine $view)
    {
    }

    public  function process(callable $next)
    {
        $this->view->addGlobal('errors', $_SESSION['errors'] ?? []);

        unset($_SESSION['errors']);

        $next();
    }
}
