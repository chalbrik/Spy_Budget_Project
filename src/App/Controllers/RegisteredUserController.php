<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class RegisteredUserController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function registeredPage()
    {
        echo $this->view->render("/registeredUser.php");
    }
}
