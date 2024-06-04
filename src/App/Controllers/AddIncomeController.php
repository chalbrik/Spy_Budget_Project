<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\TransactionService;

class AddIncomeController
{
    public function __construct(private TemplateEngine $view, private TransactionService $transactionService)
    {
    }

    public function addIncomePage()
    {
        echo $this->view->render("add-income.php");
    }

    public function addIncome()
    {
        $this->transactionService->create($_POST);

        redirectTo('/add-income');
    }
}
