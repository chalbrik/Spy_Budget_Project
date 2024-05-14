<?php

declare(strict_types=1); //ścisłe typowania, w php zmienne mogą zmieniać swoje typy podczas wykonywania danej operacji w zależności od kontekstu
//na przykład można napisać 5 + "5" i wynik będzie 10, nawet jeżeli druga zmienna to string. Ścisłe typowanie zapobiega takim sytuacjom i pilnuje żeby zmienne posiadały stały zadeklarowny typ

function dd(mixed $value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
