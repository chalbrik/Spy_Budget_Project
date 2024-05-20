<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class AddExpenseController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function addExpense()
    {
        echo $this->view->render("/add-expense.php");
    }
}
