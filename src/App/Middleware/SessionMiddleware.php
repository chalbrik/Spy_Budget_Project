<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exceptions\SessionException;
use Framework\Contracts\MiddlewareInterface;

class SessionMiddleware implements MiddlewareInterface
{
    //to jest middleware który otwiera sesje dzieki której będziemy moogli korzystać ze zmiennych globalnych
    public function process(callable $next)
    {

        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new SessionException("Session already active.");
        }

        if (headers_sent($filename, $line)) {
            throw new SessionException("Headers already sent. Consider enabling output buffering. Data outputted from {$filename} - Line: {$line}");
        }

        session_set_cookie_params(
            [
                'secure' => $_ENV['APP_ENV'] === "production",
                'httponly' => true, //to ustawienie zapobiega korzystaniu javascrpita z coockies
                'samesite' => 'lax',
            ]
        );

        session_start();

        $next();

        session_write_close();
    }
}
