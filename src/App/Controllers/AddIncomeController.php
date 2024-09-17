<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{TransactionService, ValidatorService};

class AddIncomeController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validator, private TransactionService $transactionService) {}

    public function addIncomePage()
    {
        unset($_SESSION['settings-field-name']);

        $incomesCategories = $this->transactionService->applyCategoriesToForm("incomes");


        echo $this->view->render("add-income.php", ['categories' => $incomesCategories]);
    }

    public function addIncome()
    {

        $this->validator->validateTransaction($_POST);

        $this->transactionService->create($_POST);

        redirectTo('/transaction-added');
    }
}
