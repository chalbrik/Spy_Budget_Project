<?php

declare(strict_types=1);

namespace Framework;

//celem klasy App jest łączenie wszystkich innych modułów Frameowrka (np. Router) w jednej klasie
//jezeli developer tworzy instancję tej klasy to ten obiekt tworzy następnie i przygotowuje Router miedzy innymi

class App
{

    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        echo "Application is running.";
    }

    public function get(string $path)
    {
        $this->router->add('GET', $path);
    }
    //generalnie dodaje się ścieżki w klasie Router, ale deweloper używa klasy app więc 
    //powstaje tu funkcja, która przekazuje dane do obiektu router i on przypisuje potem informacje danej ściezki do tablicy
}
