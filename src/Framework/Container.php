<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass, ReflectionNamedType; //reflection class uzywamy po to aby program mógł spojrzeć na "siebie" żeby mógł podejrzeć jakie zależności ma wstrzyknać... tak to rozumiem
use Framework\Exceptions\ContainerException;

//celem tej klasy jest stworzenie kontenera, który będzie odpowiedzialny z wstrzykiwanie zależności w naszym kodzie
//wstrzykiwanie zależności to wzorzec projektowy którego używa się do usprawnienia działania programu
//chcemy aby kontroler zwracał się do kontenera za każdym razem kiedy potrzebuje utworzenia instancji danej klasy
// w naszej aplikacji będziemy mieli wiele klas, to nie jest optymalne aby ręcznie zapisywać tworzenie obiektu danej klasy
// obiekty te powinny być tworzone tylko wtedy kiedy jest to potrzebne aby zoptymalizować działanie programu

//sam kontener posiada jedynie kod będący instrukcją tworzenia instancji obiektu danej klasy

class Container
{
    private array $definitions = [];
    private array $resolved = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions]; //jest to metoda dołączania kolejnycj elemntów tablicy bez nadpisywania poprzednich
    }

    public function resolve(string $className)
    {

        $reflectionClass = new ReflectionClass($className); //tutaj pobieram nazwę klasy kontrolera który chce sprawdzić

        //poniżej warunek, który zapewnia że klasa bedzie możliowa do zainstancjonowania
        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class {$className} is not instantiable");
        }

        $constructor = $reflectionClass->getConstructor(); // tutaj pobieramy sobie konstruktor za pomocą reflection class

        if (!$constructor) { //tutaj znowu sprawdzamy czy konstruktor wgl istnieje, jeżeli nie to zwracamy instancje klasy po prostu
            return new $className;
        }

        $params = $constructor->getParameters(); // tutaj mając konstruktor klasy która chcemy potencjalnie zainstancjonowac to pobieramy parametry konstruktora po to aby wykonać wstrzykiwanie zalezności


        if (count($params) === 0) {
            return new $className;
        }

        $dependencies = []; //teraz deklarujemy zmienną, która będzie zawierała w sobie zelżności kontruktora, który chcemy stworzyć

        foreach ($params as $param) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException("Failed to resolve class {$className} because param {$name} is missing a type hint.");
            }

            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new ContainerException("Failed to resolve class {$className} because invalid param name.");
            }


            $dependencies[] = $this->get($type->getName());
        }

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    public function get(string $id) //to jest metoda, która jest używana do wyrzucania(return) instancji jakiejkolwiek zależnosci
    {
        if (!array_key_exists($id, $this->definitions)) {
            throw new ContainerException("Class {$id} does not exists in container.");
        }

        if (array_key_exists($id, $this->resolved)) {
            return $this->resolved[$id];
        }



        $factory = $this->definitions[$id];
        $dependency = $factory($this);

        $this->resolved[$id] = $dependency;

        return $dependency;
    }
}
