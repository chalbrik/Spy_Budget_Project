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
            return $_POST['settings-field-name'];
        } else {
            return 'Profile information';
        }
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
}
