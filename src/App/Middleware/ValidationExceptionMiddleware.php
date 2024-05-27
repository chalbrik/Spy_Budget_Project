<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationExceptionMiddleware implements MiddlewareInterface
{

    public function process(callable $next)
    {
        try {
            $next();
        } catch (ValidationException $e) {
            $_SESSION['errors'] = $e->errors; //przypisujemy błędy do zmiennych sesyjnych żeby je wykorzystac potem w pliku posiadającym kod źródłowy strony gdzie moglibyśmy dynamcznnie informowac użytkownika o błędach, które trzeba poprawić
            $referer = $_SERVER['HTTP_REFERER']; //aby móc korzystać z tego middleware uniwersalnie musimy stworzyć ścieżkę referer, która pobiera z serwera zmienną superglobalną równą ścieżce pliku z którego użytkownik przesyła dane z formularza
            redirectTo($referer);
        }
    }
}
