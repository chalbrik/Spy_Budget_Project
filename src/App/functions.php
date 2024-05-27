<?php

declare(strict_types=1); //ścisłe typowania, w php zmienne mogą zmieniać swoje typy podczas wykonywania danej operacji w zależności od kontekstu
//na przykład można napisać 5 + "5" i wynik będzie 10, nawet jeżeli druga zmienna to string. Ścisłe typowanie zapobiega takim sytuacjom i pilnuje żeby zmienne posiadały stały zadeklarowny typ

function dd(mixed $value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//funkcja escape, która zapobiega atakom xss czyli przekazywaniu danych w przekazywanych przez użytkownika na stronie w postaci 
//znaków interpretowanych przez interpretor jako kod
function e($value): string
{
    return htmlspecialchars((string) $value);
}

function redirectTo(string $path)
{
    header("Location: {$path}");
    http_response_code(302);
    exit();
}
