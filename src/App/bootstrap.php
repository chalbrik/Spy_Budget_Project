<?php

//cel: załadować i skonfigurować pliki potrzebne do działania naszej aplikacji

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Config\Paths;
use Dotenv\Dotenv;

use function App\Config\{registerRoutes, registerMiddleware};

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$app = new App(Paths::SOURCE . "App/container-definitions.php");

//zawsze jak tutaj deklaruje funkcje które rejestrują albo Routes albo middlewares dla aplikacji trzeba dodać zależności w composer.json
registerRoutes($app);
registerMiddleware($app);


return $app;
