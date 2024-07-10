<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{UserService, ValidatorService, TransactionService};

class SettingsController
{
    public function __construct(
        private TemplateEngine $view,
        private UserService $userService,
        private ValidatorService $validatorService,
        private TransactionService $transactionService
    ) {
    }

    public function settings()
    {

        $selectedSettingsFieldTab =  $this->getSettingsFieldTab();
        $usernameData = $this->userService->getUsername();
        $username = $usernameData["user_name"];

        $incomesCategories = $this->transactionService->applyCategoriesToForm("incomes");
        $expensesCategories = $this->transactionService->applyCategoriesToForm("expenses");

        echo $this->view->render("/settings.php", [
            'selectedSettingsFieldTab' => $selectedSettingsFieldTab,
            'username' => $username,
            'incomeCategories' => $incomesCategories,
            'expensesCategories' => $expensesCategories
        ]);
    }

    public function getSettingsFieldTab()
    {

        if (isset($_POST['settings-field-name'])) {
            $settingsFieldName = htmlspecialchars($_POST['settings-field-name']);
            $_SESSION['settings-field-name'] = $settingsFieldName;
        } elseif (empty($_POST['settings-field-name']) && empty($_SESSION['settings-field-name'])) {
            $_SESSION['settings-field-name'] = 'Profile information';
        }

        return $_SESSION['settings-field-name'];
    }

    public function changeUsername()
    {
        $this->validatorService->validateUpdateUsername($_POST);

        $this->userService->changeUsername($_POST['new-username']);

        redirectTo('/settings');
    }

    public function changePassword()
    {
        $this->validatorService->validateUpdatePassword($_POST);

        $this->userService->checkOldPassword($_POST);

        $this->userService->changePassword($_POST);

        redirectTo('/settings');
    }

    public function addNewIncomeCategory()
    {
        $this->validatorService->validateNewIncomeCategory($_POST);

        $this->transactionService->addNewIncomeCategory($_POST);

        redirectTo('/settings');
    }

    public function addNewExpenseCategory()
    {

        $this->validatorService->validateNewExpenseCategory($_POST);

        $this->transactionService->addNewExpenseCategory($_POST);

        redirectTo('/settings');
    }

    public function deleteExpenseCategory(array $params)
    {
        $this->transactionService->deleteExpenseCategory((int) $params['category']); //tutaj wpsiujemy jako klucz tą nazwę, która jest zapisana w trasie settings/category/{category}, bo tak zostało to zaprogramowane w routerze

        redirectTo('/settings');
    }

    public function deleteIncomeCategory(array $params)
    {
        $this->transactionService->deleteIncomeCategory((int) $params['category']); //tutaj wpsiujemy jako klucz tą nazwę, która jest zapisana w trasie settings/category/{category}, bo tak zostało to zaprogramowane w routerze

        redirectTo('/settings');
    }
}
