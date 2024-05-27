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

            $oldFormData = $_POST;

            $excludedFields = ['password', 'confirmPassword'];
            $formattedFormData = array_diff_key($oldFormData, array_flip($excludedFields));

            $_SESSION['errors'] = $e->errors; //przypisujemy błędy do zmiennych sesyjnych żeby je wykorzystac potem w pliku posiadającym kod źródłowy strony gdzie moglibyśmy dynamcznnie informowac użytkownika o błędach, które trzeba poprawić

            //poniższy fragment kodu będzie odpowiedzialny za przechowywanie danych wpisanych przez użytkownika po to aby później automatycznie uzupełnić je w formularzach
            $_SESSION['oldFormData'] = $formattedFormData;

            $referer = $_SERVER['HTTP_REFERER']; //aby móc korzystać z tego middleware uniwersalnie musimy stworzyć ścieżkę referer, która pobiera z serwera zmienną superglobalną równą ścieżce pliku z którego użytkownik przesyła dane z formularza
            redirectTo($referer);
        }
    }
}
