<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{TransactionService, ValidatorService};

class AddExpenseController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validator, private TransactionService $transactionService) {}

    public function addExpensePage()
    {
        unset($_SESSION['settings-field-name']);

        $expensesCategories = $this->transactionService->applyCategoriesToForm("expenses");

        echo $this->view->render("/add-expense.php", ['categories' => $expensesCategories]);
    }

    public function addExpense()
    {

        //tutaj trzeba dodac jeszcze walidację danych z formularza
        //do walidowania danych używamy walidatora

        $this->validator->validateTransaction($_POST);

        $this->transactionService->create($_POST);

        redirectTo('/transaction-added');
    }

    public function getCategoryLimit(array $params)
    {
        $categoryId = $params["categoryId"];

        $incomesCategoryLimit =  $this->transactionService->getCategoryLimit($categoryId);

        // dd($incomesCategoryLimit);

        echo json_encode($incomesCategoryLimit);
    }

    public function updateCategoryLimit(array $params)
    {

        $categoryId = $params["categoryId"];

        $categoryLimit = $_POST['category_limit'];

        $this->transactionService->updateCategoryLimit($categoryId, $categoryLimit);

        redirectTo('/settings');
    }

    public function getLimitValue(array $params)
    {
        //ona ma pobierać sume wydatków dla danego miesiąca, który został wybrany

        $categoryId = $params['categoryId'];
        $date = $params['date'];

        $limitValue = $this->transactionService->getLimitValue($categoryId, $date);

        echo json_encode($limitValue);
    }
}
