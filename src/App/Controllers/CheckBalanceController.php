<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class CheckBalanceController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function checkBalance()
    {
        echo $this->view->render("/check-balance.php");
    }
}
