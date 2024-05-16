<?php

declare(strict_types=1);

namespace Framework;

//zadanie Routera jest wyświetlenie właściwej strony internetowej dla podanego adresu Url, a konkretniej wybranie odpowieniego kontrolera dla danego adresu Url

class Router
{

    private array $routes = []; // to jest tablica moich routes
    private array $middlewares = []; //okazuje się że przechowujemy tablice z middlewares w routerze!

    //poniżej metoda dodawania routes
    public function add(string $method, string $path, array $controller)
    {

        $path = $this->normalizePath($path);

        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
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

    public function dispatch(string $path, string $method, Container $container = null)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);
        // tutaj formatuję path oraz metodę aby mieć pewność że są prawidłowo przekazywane dalej w metodzie

        //w tej pętli foereach następuje przekazani argumentów funkcji dispatch i porównywwanie ją z wszystkimi routes które są tablicą
        //okresloną w tej klasie. Jeżeli znajdziemy dany route z okresloną ścieżka i metodami to zakładam że korzystamy z niej dalej
        //żeby wyswietlić stronę lub wykonać jakieś operacje

        foreach ($this->routes as $route) {

            if (!preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
                continue;
            }

            //tutaj przypisujemy zmiennym class oraz function wartości kontrolera, który został znaleziony w powyżrzej pętli
            //controller to tablica, którego wartości można przypisać do zmiennych w taki sposób
            [$class, $function] = $route['controller'];

            $controllerInstance = $container ? $container->resolve($class) : new $class; //tu następuje wstrzykiwanie zależności do nowo utworzonego kontrolera
            //ten zapis oznacza że tworzy się instancję(obiekt) klasy kontrolera w tym miejscu. Można użyć zmiennej class jako nazwy klasy
            //tutaj też zrobiliśmy coś takiego że w zależnosci od tego jeżeli mamy jakiś kontroler, który wamaga przy instancji swojego obiektu jakiej parmetry to wstrzykniemy
            //je za pomocą kontenera. Jeżeli nie to po prostu klasa kontrolera zostanie utworzona i tyle

            $action = fn () => $controllerInstance->{$function}(); // a tutaj wywoływana jest funkcja tego controlera

            //powyższy zabieg nazywa sie dynamicznym tworzeniem instancji klasy

            foreach ($this->middlewares as $middleware) {
                $middlewareInstance = $container ? $container->resolve($middleware) : new $middleware; //tutuaj następuje wstrzykiwanie zależności do nowo utworzonego middleware
                $action = fn () => $middlewareInstance->process($action);
            }

            $action();

            return;
        }
    }

    public function addMiddleware(string $middleware)
    {
        $this->$middleware[] = $middleware;
    }
}
