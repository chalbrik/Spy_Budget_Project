<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class AddIncomeController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function addIncome()
    {
        echo $this->view->render("add-income.php");
    }
}
