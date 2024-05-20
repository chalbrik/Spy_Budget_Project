<?php

declare(strict_types=1);


use Framework\TemplateEngine;
use App\Config\Paths;
use App\Services\ValidatorService;

return [
    //tutaj TemplatEngine::class jest kluczem, a funkcja jest wartościa. Technicznie nie musimy uzywać nazwy klasy jako nazwy klucza, ale to jest dobra praktyka
    TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService()

];
