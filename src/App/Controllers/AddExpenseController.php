<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\TransactionService;

class AddExpenseController
{
    public function __construct(private TemplateEngine $view, private TransactionService $transactionService)
    {
    }

    public function addExpensePage()
    {
        echo $this->view->render("/add-expense.php");
    }

    public function addExpense()
    {
        $this->transactionService->create($_POST);

        redirectTo('/add-expense');
    }
}
