<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class MainUserPageController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function mainUserPage()
    {
        echo $this->view->render("/userpage.php");
    }
}
