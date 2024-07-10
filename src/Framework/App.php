<?php

declare(strict_types=1);

namespace Framework;

//celem klasy App jest łączenie wszystkich innych modułów Frameowrka (np. Router, container) w jednej klasie
//jezeli developer tworzy instancję tej klasy to ten obiekt tworzy następnie i przygotowuje Router miedzy innymi

class App
{

    private Router $router;
    private Container $container;

    public function __construct(string $containerDefinitionsPath = null) //tutaj w kontruktorze przekazujemy ścieżkę do container-definitions
    {
        $this->router = new Router();
        $this->container = new Container(); // po utworzeniu tego obiektu możemy zacząć używać wzorca wstrzykiwania zależności

        if ($containerDefinitionsPath) {
            $containerDefinitions = include $containerDefinitionsPath;
            // w tym miejscu jeżeli ściezka do container-definitions istnieje to 
            //include $containerDefinitionsPath: Używa funkcji include, aby załadować plik z definicjami kontenera z podanej ścieżki. 
            //Zmienna $containerDefinitionsPath zawiera ścieżkę do pliku, który zwraca tablicę definicji zależności.
            //include w tym kontekście zwraca zawartość pliku, co oznacza, że zakłada się, iż plik zawiera kod, który zwraca tablicę 
            //definicji. Ta tablica jest przypisywana do zmiennej $containerDefinitions. A zwraca bo container-definitions posiada na końcu 
            //return [] i tablice z definicjami

            $this->container->addDefinitions($containerDefinitions); // ten fragment dodaje definicje do wewnętrznej struktury klasy kontenera
        }
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method, $this->container);
    }

    public function get(string $path, array $controller): App
    {
        $this->router->add('GET', $path, $controller);

        return $this;
    }
    //generalnie dodaje się ścieżki w klasie Router, ale deweloper używa klasy app więc 
    //powstaje tu funkcja, która przekazuje dane do obiektu router i on przypisuje potem informacje danej ściezki do tablicy

    public function post(string $path, array $controller): App
    {
        $this->router->add('POST', $path, $controller);

        return $this;
    }

    public function delete(string $path, array $controller): App
    {
        $this->router->add('DELETE', $path, $controller);

        return $this;
    }

    public function addMiddleware(string $middleware)
    {
        $this->router->addMiddleware($middleware);
    }

    public function add(string $middleware)
    {
        $this->router->addRouteMiddleware($middleware);
    }
}
