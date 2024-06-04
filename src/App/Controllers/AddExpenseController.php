<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{TransactionService, ValidatorService};

class AddExpenseController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validator, private TransactionService $transactionService)
    {
    }

    public function addExpensePage()
    {

        $expensesCategories = $this->transactionService->applyCategoriesToForm("expenses");

        echo $this->view->render("/add-expense.php", ['categories' => $expensesCategories]);
    }

    public function addExpense()
    {

        //tutaj trzeba dodac jeszcze walidację danych z formularza
        //do walidowania danych używamy walidatora

        $this->validator->validateTransaction($_POST);

        $this->transactionService->create($_POST);

        redirectTo('/add-expense');
    }
}
