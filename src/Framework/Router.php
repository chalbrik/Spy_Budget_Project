<?php

declare(strict_types=1);

namespace Framework;

class Router
{

    private array $routes = []; // to jest tablica moich routes

    //poniżej metoda dodawania routes
    public function add(string $method, string $path)
    {

        $path = $this->normalizePath($path);

        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method)
        ];
        //to jest dodawanie wartości do tablicy routes, wartością tą tez jest tablica, w tablicy 
        //routes znajdują się trasy z konfiguracjami oraz danymi co z nimi robić
    }

    //potrzebuję funkcji, która będzie pilnować, że ścieżka jest przekazywanan do tablicy routes we 
    //właściwym formacie czyli ma /abc/abc/, w razie gdyby ktoś nie dodał / wpisując url
    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');

        $path = "/{$path}/";

        $path = preg_replace('#[/]{2,}#', '/', $path);

        return $path;
    }
}
