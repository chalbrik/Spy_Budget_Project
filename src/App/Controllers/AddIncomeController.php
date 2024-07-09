<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{TransactionService, ValidatorService};

class AddIncomeController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validator, private TransactionService $transactionService)
    {
    }

    public function addIncomePage()
    {
        unset($_SESSION['settings-field-name']);

        //myślę że tutaj trzebabyło dodać funkcję pobierania danych z bazy danych dotyczących domyślnych kategorii dla uzytkownika
        //może jest lepsze miejsce żeby to zrobic ale niech na razie to będzie tutuaj

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
