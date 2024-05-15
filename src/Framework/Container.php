<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass; //reflection class uzywamy po to aby program mógł spojrzeć na "siebie" żeby mógł podejrzeć jakie zależności ma wstrzyknać... tak to rozumiem


//celem tej klasy jest stworzenie kontenera, który będzie odpowiedzialny z wstrzykiwanie zależności w naszym kodzie
//wstrzykiwanie zależności to wzorzec projektowy którego używa się do usprawnienia działania programu
//chcemy aby kontroler zwracał się do kontenera za każdym razem kiedy potrzebuje utworzenia instancji danej klasy
// w naszej aplikacji będziemy mieli wiele klas, to nie jest optymalne aby ręcznie zapisywać tworzenie obiektu danej klasy
// obiekty te powinny być tworzone tylko wtedy kiedy jest to potrzebne aby zoptymalizować działanie programu

//sam kontener posiada jedynie kod będący instrukcją tworzenia instancji obiektu danej klasy

class Container
{
    private array $definitions = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions]; //jest to metoda dołączania kolejnycj elemntów tablicy bez nadpisywania poprzednich
    }

    public function resolve(string $className)
    {

        $reflectionClass = new ReflectionClass($className); //tutaj pobieram nazwę klasy kontrolera który chce sprawdzić

        if(!$reflectionClass->isInstantiable())
    }
}
