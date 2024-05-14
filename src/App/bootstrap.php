<?php

//cel: załadować i skonfigurować pliki potrzebne do działania naszej aplikacji

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use App\Controllers\HomeController;
use Framework\App;

$app = new App();

$app->get('/', [HomeController::class, 'home']);

return $app;
