<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;


class HomeController
{

    public function __construct(private TemplateEngine $view) //poprzez wstawienie obiektu klasy template engine jako argumentu konstruktora umożliwiamy contenerowi do podejrzenia czego potrzebuje klasa home kontroler zeby została utworzona przez kontener
    {
    }

    public function home()
    {
        echo $this->view->render("/index.php");
    }
}
